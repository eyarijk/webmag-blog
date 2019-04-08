<?php

namespace App\Serializer\Normalizer;

use App\Entity\Article;
use App\Repository\CategoryRepository;
use App\Repository\TagRepository;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class ArticleDenormalizer implements DenormalizerInterface
{
    /**
     * @var ObjectNormalizer
     */
    private $objectNormalizer;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * ArticleDenormalizer constructor.
     * @param ObjectNormalizer $objectNormalizer
     * @param CategoryRepository $categoryRepository
     * @param TagRepository $tagRepository
     */
    public function __construct(ObjectNormalizer $objectNormalizer, CategoryRepository $categoryRepository, TagRepository $tagRepository)
    {
        $this->objectNormalizer = $objectNormalizer;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $class, $format = null, array $context = []): Article
    {
        $categoryData = null;

        if (isset($data['category'])) {
            $categoryData = $data['category'];
            unset($data['category']);
        }

        $tagsData = [];

        if (isset($data['tags'])) {
            $tagsData = $data['tags'];
            unset($data['tags']);
        }

        /** @var Article $article */
        $article = $this->objectNormalizer->denormalize($data, $class, $format, $context);

        if ($categoryData !== null && isset($categoryData['id'])) {
            $category = $this->categoryRepository->find($categoryData['id']);

            if ($category !== null) {
                $article->setCategory($category);
            }
        }

        if (\count($tagsData) > 0) {
            $tagsId = array_map(function ($tagData) {
                return $tagData['id'];
            }, $tagsData);

            $tags = $this->tagRepository->findBy([
                'id' => $tagsId,
            ]);

            foreach ($tags as $tag) {
                $article->addTag($tag);
            }
        }

        return $article;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === Article::class;
    }
}
