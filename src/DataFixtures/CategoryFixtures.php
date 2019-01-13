<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class CategoryFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 20; ++$i) {
            $tag = new Category();
            $tag->setTitle($faker->jobTitle);
            $tag->setSlug($faker->slug);
            $tag->setIsEnabled($faker->boolean);
            $tag->setIsShowMenu($tag->getIsEnabled() === true ? $faker->boolean : false);
            $manager->persist($tag);
        }

        $manager->flush();
    }
}
