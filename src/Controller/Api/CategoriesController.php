<?php

namespace App\Controller\Api;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

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
