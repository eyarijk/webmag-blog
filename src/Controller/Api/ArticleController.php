<?php

namespace App\Controller\Api;

use App\Entity\ArticleImage;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use App\Service\ImageUpload;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class ArticleController extends AbstractController
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * TagsController constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param Request $request
     * @param ImageUpload $imageUpload
     * @return Response
     */
    public function uploadImage(Request $request, ImageUpload $imageUpload): Response
    {
        if ($request->files->has('image') === false) {
            $jsonData = $this->serializer->serialize([
                'error' => [
                    'status' => Response::HTTP_BAD_REQUEST,
                    'message' => 'In the request you need to pass the image.',
                ],
            ], 'json');

            return new Response($jsonData, Response::HTTP_BAD_REQUEST, [
                'Content-Type' => 'application/json',
            ]);
        }

        $fileName = $imageUpload->upload($request->files->get('image'));

        $articleImage = new ArticleImage();
        $articleImage->setName($fileName);

        $em = $this->getDoctrine()->getManager();

        $em->persist($articleImage);

        $em->flush();

        $jsonData = $this->serializer->serialize([
            'error' => [],
            'data' => [
                'article_image' => $articleImage,
                'prefix_url' => $this->getParameter('images_public_path'),
            ],
        ], 'json', [
            'groups' => ['forCreate'],
        ]);

        return new Response($jsonData, Response::HTTP_OK, [
            'Content-Type' => 'application/json',
        ]);
    }

    public function persistUpdate(Request $request, ArticleRepository $articleRepository): Response
    {
        $form = $this->createForm(ArticleType::class);
        $form->handleRequest($request);

        return new JsonResponse($request);
    }

    public function index(Request $request, ArticleRepository $articleRepository, PaginatorInterface $paginator): Response
    {
        $articlesQuery = $articleRepository->getSortByIdDescByUserQuery($this->getUser());

        $articles = $paginator->paginate(
            $articlesQuery,
            $request->query->getInt('page', 1),
            10
        );
        $jsonData = $this->serializer->serialize([
            'error' => [],
            'data' => [],
        ],'json');

        return new Response($jsonData, Response::HTTP_OK, [
            'Content-Type' => 'application/json',
        ]);
    }
}
