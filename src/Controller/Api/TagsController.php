<?php

namespace App\Controller\Api;

use App\Entity\Tag;
use App\Repository\TagRepository;
use Doctrine\ORM\EntityManagerInterface;
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
