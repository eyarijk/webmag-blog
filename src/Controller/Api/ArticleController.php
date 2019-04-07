<?php

namespace App\Controller\Api;

use App\DTO\UserArticleListDTO;
use App\Entity\Article;
use App\Entity\ArticleImage;
use App\Repository\ArticleRepository;
use App\Service\ImageUpload;
use App\Service\UserArticleDTOGenerator;
use Knp\Component\Pager\Pagination\SlidingPagination;
use Knp\Component\Pager\PaginatorInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Swagger\Annotations as SWG;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class ArticleController.
 * @IsGranted("ROLE_USER")
 */
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
     * Upload Image file to server and get entity object.
     *
     * @SWG\Parameter(
     *     name="image",
     *     type="file",
     *     in="formData",
     *     description="Image file (binary)"
     * )
     *
     * @SWG\Response(
     *     response=201,
     *     description="Return image object with prefix",
     *     @SWG\Schema(type="object",
     *         @SWG\Property(property="data", type="object",
     *             @SWG\Property(property="article_image", type="object", ref=@Model(type=ArticleImage::class, groups={"forCreate"})),
     *             @SWG\Property(property="prefix_url", type="string", description="Prefix url for image path."),
     *         ),
     *     )
     * )
     * or
     *
     * @SWG\Response(
     *     response=400,
     *     description="In the request you need to pass the image.",
     *     @SWG\Schema(type="object",
     *         @SWG\Property(property="error", type="object",
     *             @SWG\Property(property="status", type="integer", description="Status code"),
     *             @SWG\Property(property="message", type="string", description="Error Message"),
     *         )
     *     )
     * )
     * @SWG\Tag(name="articles")
     * @Security(name="Bearer")
     *
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
            'data' => [
                'article_image' => $articleImage,
                'prefix_url' => $this->getParameter('images_public_path'),
            ],
        ], 'json', [
            'groups' => ['forCreate'],
        ]);

        return new Response($jsonData, Response::HTTP_CREATED, [
            'Content-Type' => 'application/json',
        ]);
    }

    /**
     * @SWG\Parameter(
     *     name="page",
     *     type="integer",
     *     in="query",
     *     description="Number of page",
     *     required=false
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Get articles",
     *     @SWG\Schema(type="object",
     *         @SWG\Property(property="data", type="object",
     *             @SWG\Property(property="articles", type="array", @SWG\Items(ref=@Model(type=UserArticleListDTO::class, groups={"userArticle"}))),
     *             @SWG\Property(property="paging", type="object",
     *                 @SWG\Property(property="current", type="integer"),
     *                 @SWG\Property(property="currentItemCount", type="integer"),
     *                 @SWG\Property(property="endPage", type="integer"),
     *                 @SWG\Property(property="first", type="integer"),
     *                 @SWG\Property(property="firstItemNumber", type="integer"),
     *                 @SWG\Property(property="firstPageInRange", type="integer"),
     *                 @SWG\Property(property="last", type="integer"),
     *                 @SWG\Property(property="lastItemNumber", type="integer"),
     *                 @SWG\Property(property="lastPageInRange", type="integer"),
     *                 @SWG\Property(property="next", type="integer"),
     *                 @SWG\Property(property="numItemsPerPage", type="integer"),
     *                 @SWG\Property(property="pageCount", type="integer"),
     *                 @SWG\Property(property="pageRange", type="integer"),
     *                 @SWG\Property(property="pagesInRange", type="array", @SWG\Items(type="integer")),
     *                 @SWG\Property(property="startPage", type="integer"),
     *                 @SWG\Property(property="totalCount", type="integer"),
     *             )
     *         ),
     *     )
     * )
     *
     * @SWG\Tag(name="articles")
     * @Security(name="Bearer")
     *
     * @param Request $request
     * @param ArticleRepository $articleRepository
     * @param PaginatorInterface $paginator
     * @param UserArticleDTOGenerator $generator
     * @return Response
     */
    public function index(Request $request, ArticleRepository $articleRepository, PaginatorInterface $paginator, UserArticleDTOGenerator $generator): Response
    {
        $articlesQuery = $articleRepository->getSortByIdDescByUserWithCountCommentAndCountViewsQuery($this->getUser());

        /**
         * @var SlidingPagination $articles
         */
        $articles = $paginator->paginate(
            $articlesQuery,
            $request->query->getInt('page', 1),
            10
        );

        $userArticles = [];

        foreach ($articles as $article) {
            $userArticles[] = $generator->generate($article);
        }

        $jsonData = $this->serializer->serialize([
            'data' => [
                'articles' => $userArticles,
                'paging' => $articles->getPaginationData(),
            ],
        ], 'json', [
            'groups' => ['userArticle'],
        ]);

        return new Response($jsonData, Response::HTTP_OK, [
            'Content-Type' => 'application/json',
        ]);
    }

    /**
     * @SWG\Parameter(
     *     name="slug",
     *     type="string",
     *     in="path",
     *     description="Article slug",
     *     required=true
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Get articles by slug",
     *     @SWG\Schema(type="object",
     *         @SWG\Property(property="data", type="object",
     *             @SWG\Property(property="article", ref=@Model(type=Article::class, groups={"userArticleEdit"})),
     *             @SWG\Property(property="publicPath", type="string")
     *         ),
     *     )
     * )
     *
     * @SWG\Tag(name="articles")
     * @Security(name="Bearer")
     *
     * @param Article $article
     * @return Response
     * @IsGranted("view", subject="article")
     */
    public function show(Article $article): Response
    {
        $jsonData = $this->serializer->serialize([
            'data' => [
                'article' => $article,
                'publicPath' => rtrim($this->getParameter('images_public_path'), '/') . '/',
            ],
        ], 'json', [
            'groups' => ['userArticleEdit'],
        ]);

        return new Response($jsonData, Response::HTTP_OK, [
            'Content-Type' => 'application/json',
        ]);
    }

    /**
     * @SWG\Parameter(
     *     name="Tag",
     *     in="body",
     *     description="Create new Article",
     *     type="object",
     *     @Model(type=Article::class, groups={"userArticleEdit"})
     * ),
     * @SWG\Response(
     *     response=201,
     *     description="New Article",
     *     @Model(type=Article::class, groups={"userArticleEdit"})
     * )
     * @SWG\Tag(name="articles")
     * @Security(name="Bearer")
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $json = $request->getContent();

        $article = $this->serializer->deserialize($json, Article::class, 'json', [
            'groups' => ['userArticleEdit'],
        ]);

        dd($article);

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($article);
        $entityManager->flush();

        $articleJson = $this->serializer->serialize($article, 'json', [
            'groups' => ['userArticleEdit'],
        ]);

        return new Response($articleJson, Response::HTTP_CREATED, [
            'Content-Type' => 'application/json',
        ]);
    }
}
