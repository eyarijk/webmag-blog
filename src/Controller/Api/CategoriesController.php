<?php

namespace App\Controller\Api;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;

class CategoriesController extends AbstractController
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * CategoriesController constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * List active Categories
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return list of categories",
     *     @SWG\Schema(type="object",
     *         @SWG\Property(property="data", type="object",
     *             @SWG\Property(property="categories", type="array", @SWG\Items(ref=@Model(type=Category::class, groups={"forArticle"}))),
     *         )
     *     )
     * )
     * @SWG\Tag(name="categories")
     * @Security(name="Bearer")
     *
     * @param CategoryRepository $categoryRepository
     * @return Response
     */
    public function active(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findEnabled();

        $jsonCategories = $this->serializer->serialize([
            'data' => [
                'categories' => $categories,
            ],
        ], 'json', [
            'groups' => ['forArticle'],
        ]);

        return new Response($jsonCategories, Response::HTTP_OK, [
            'Content-Type' => 'application/json',
        ]);
    }
}
