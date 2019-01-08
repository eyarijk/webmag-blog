<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class TagFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 20; ++$i) {
            $tag = new Tag();
            $tag->setTitle($faker->jobTitle);
            $tag->setSlug($faker->slug);
            $tag->setIsEnabled($faker->boolean);
            $manager->persist($tag);
        }

        $manager->flush();
    }
}
