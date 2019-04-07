<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\ArticleImage;
use App\Entity\Category;
use App\Entity\Tag;
use App\Entity\User;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use App\Repository\TagRepository;
use App\Repository\UserRepository;
use App\Service\ImageUpload;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @var ImageUpload
     */
    private $imageUpload;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * ArticleFixtures constructor.
     * @param ImageUpload $imageUpload
     * @param CategoryRepository $categoryRepository
     * @param TagRepository $tagRepository
     * @param UserRepository $userRepository
     */
    public function __construct(
        ImageUpload $imageUpload,
        CategoryRepository $categoryRepository,
        TagRepository $tagRepository,
        UserRepository $userRepository
    )
    {
        $this->imageUpload = $imageUpload;
        $this->tagRepository = $tagRepository;
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $categories = $this->categoryRepository->findAll();
        $tags = $this->tagRepository->findAll();
        $user = $this->userRepository->findOneBy([]);

        for ($i = 0; $i < 100; ++$i) {
            shuffle($categories);
            shuffle($tags);

            $imageFile = $this->imageUpload->uploadFromUrl($faker->imageUrl(), uniqid('image_fixture',true) . $i . '.jpeg');

            $articleImage = new ArticleImage();
            $articleImage->setName($imageFile);

            $dateTime = $faker->dateTime;

            $article = new Article();
            $article->setIsEnabled($faker->boolean);
            $article->setTitle($faker->name);
            $article->setSlug($faker->slug);
            $article->setCreatedAt($dateTime);
            $article->setDescription($faker->text);
            $article->setShortDescription($faker->text);
            $article->setUser($user);
            $article->setUpdatedAt($dateTime);
            $article->setPublishedAt($article->getIsEnabled() ? new \DateTime() : null);
            $article->setIsMain($article->getIsEnabled() ? $faker->boolean : false);
            $article->setMainImage($articleImage);
            $article->setHeaderImage($articleImage);
            $article->setCategory($categories[0]);

            for ($j = 0; $j < 5; ++$j) {
                $article->addTag($tags[$j]);
            }

            $manager->persist($article);
        }

        $manager->flush();
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            TagFixtures::class,
            UserFixtures::class,
            CategoryFixtures::class,
        ];
    }
}
