<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Tag;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ArticleFixtures extends Fixture implements DependentFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null): void
    {
        $this->container = $container;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $categories = $manager->getRepository(Category::class)->findAll();
        $tags = $manager->getRepository(Tag::class)->findAll();
        $user = $manager->getRepository(User::class)->findOneBy([]);

        $dir = $this->container->getParameter('articles_images_directory') . '/';

        for ($i = 0; $i < 200; ++$i) {
            shuffle($categories);
            shuffle($tags);

            $mainImageName = md5(time()) . $i . '.jpeg';

            $imageFile = file_get_contents($faker->imageUrl());
            file_put_contents($dir . $mainImageName, $imageFile);

            $article = new Article();
            $article->setIsEnabled($faker->boolean);
            $article->setTitle($faker->name);
            $article->setSlug($faker->slug);
            $article->setCreatedAt($faker->dateTime);
            $article->setDescription($faker->text);
            $article->setShortDescription($faker->text);
            $article->setUser($user);
            $article->setUpdatedAt($article->getCreatedAt());
            $article->setPublishedAt($article->getIsEnabled() ? new \DateTime() : null);
            $article->setIsMain($article->getIsEnabled() ? $faker->boolean : false);
            $article->setMainImage($mainImageName);
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
