<?php

namespace App\Controller\Api;

use App\Entity\Tag;
use App\Repository\TagRepository;
use Doctrine\ORM\EntityManagerInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class TagsController extends AbstractController
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
     * List Tags.
     *
     * This call takes offset, limit.
     *
     * @SWG\Parameter(
     *     name="offset",
     *     in="query",
     *     type="integer",
     *     description="Offset for tags"
     * )
     *
     * @SWG\Parameter(
     *     name="limit",
     *     in="query",
     *     type="integer",
     *     description="Limit for tags"
     * )
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return list of tags",
     *     @SWG\Schema(type="object",
     *         @SWG\Property(property="data", type="object",
     *             @SWG\Property(property="tags", type="array", @SWG\Items(ref=@Model(type=Tag::class, groups={"list"}))),
     *         ),
     *         @SWG\Property(property="paging", type="object",
     *             @SWG\Property(property="limit", type="integer"),
     *             @SWG\Property(property="offset", type="integer"),
     *             @SWG\Property(property="total", type="integer"),
     *         )
     *     )
     * )
     * @SWG\Tag(name="tags")
     * @Security(name="Bearer")
     *
     * @param TagRepository $tagRepository
     * @param Request $request
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @return Response
     */
    public function index(TagRepository $tagRepository, Request $request): Response
    {
        $offset = $request->query->getInt('offset', 0);
        $limit = $request->query->getInt('limit', 5);

        $tags = $tagRepository->paginateByLimitAndOffset($offset, $limit);

        $totalTags = $tagRepository->getCount();

        $jsonTags = $this->serializer->serialize([
            'data' => [
                'tags' => $tags,
            ],
            'paging' => [
                'limit' => $limit,
                'offset' => $offset,
                'total' => $totalTags,
            ],
        ], 'json', [
            'groups' => ['list'],
        ]);

        return new Response($jsonTags, Response::HTTP_OK, [
            'Content-Type' => 'application/json',
        ]);
    }

    /**
     * List active tags.
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return list of tags",
     *     @SWG\Schema(type="object",
     *         @SWG\Property(property="data", type="object",
     *             @SWG\Property(property="tags", type="array", @SWG\Items(ref=@Model(type=Tag::class, groups={"forArticle"}))),
     *         )
     *     )
     * )
     * @SWG\Tag(name="tags")
     * @Security(name="Bearer")
     *
     * @param TagRepository $tagRepository
     * @return Response
     */
    public function active(TagRepository $tagRepository): Response
    {
        $tags = $tagRepository->getEnabled();

        $jsonTags = $this->serializer->serialize([
            'data' => [
                'tags' => $tags,
            ],
        ], 'json', [
            'groups' => ['forArticle'],
        ]);

        return new Response($jsonTags, Response::HTTP_OK, [
            'Content-Type' => 'application/json',
        ]);
    }

    /**
     * Create new Tag.
     *
     * @SWG\Parameter(
     *     name="Tag",
     *     in="body",
     *     description="Create new Tag",
     *     type="object",
     *     @Model(type=Tag::class, groups={"create"})
     * ),
     * @SWG\Response(
     *     response=201,
     *     description="New Tag",
     *     @Model(type=Tag::class, groups={"list"})
     * )
     * @SWG\Tag(name="tags")
     * @Security(name="Bearer")
     *
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function store(Request $request, EntityManagerInterface $entityManager): Response
    {
        $json = $request->getContent();

        $tag = $this->serializer->deserialize($json, Tag::class, 'json');

        $entityManager->persist($tag);
        $entityManager->flush();

        $tagJson = $this->serializer->serialize($tag, 'json', [
            'groups' => ['list'],
        ]);

        return new Response($tagJson, Response::HTTP_CREATED, [
            'Content-Type' => 'application/json',
        ]);
    }

    /**
     * Return Tag by Slug.
     *
     * @SWG\Response(
     *     response=200,
     *     description="Return Tag by Slug",
     *     @Model(type=Tag::class, groups={"list"})
     * )
     * @SWG\Tag(name="tags")
     * @Security(name="Bearer")
     *
     * @param Tag $tag
     * @return Response
     */
    public function show(Tag $tag): Response
    {
        $tagJson = $this->serializer->serialize($tag, 'json', [
            'groups' => ['list'],
        ]);

        return new Response($tagJson, Response::HTTP_OK, [
            'Content-Type' => 'application/json',
        ]);
    }

    /**
     * Delete tag by Slug.
     *
     * @SWG\Response(
     *     response=204,
     *     description="Delete Tag by Slug"
     * )
     * @SWG\Tag(name="tags")
     * @Security(name="Bearer")
     *
     * @param string $slug
     * @param TagRepository $tagRepository
     * @return Response
     */
    public function delete(string $slug, TagRepository $tagRepository): Response
    {
        $tagRepository->removeBySlug($slug);

        return new Response('', Response::HTTP_NO_CONTENT, [
            'Content-Type' => 'application/json',
        ]);
    }

    /**
     * Update Tag by Slug.
     *
     * @SWG\Parameter(
     *     name="Tag",
     *     in="body",
     *     description="Existing tag",
     *     type="object",
     *     @Model(type=Tag::class, groups={"create"})
     * ),
     * @SWG\Response(
     *     response=200,
     *     description="Updated Tag",
     *     @Model(type=Tag::class, groups={"list"})
     * )
     *
     * @SWG\Tag(name="tags")
     * @Security(name="Bearer")
     *
     * @param Tag $tag
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function update(Tag $tag, Request $request, EntityManagerInterface $entityManager): Response
    {
        $json = $request->getContent();

        $this->serializer->deserialize($json, Tag::class, 'json', [
            'object_to_populate' => $tag,
        ]);

        $entityManager->flush();

        $tagJson = $this->serializer->serialize($tag, 'json', [
            'groups' => ['list'],
        ]);

        return new Response($tagJson, Response::HTTP_OK, [
            'Content-Type' => 'application/json',
        ]);
    }
}
