<?php

namespace App\DataFixtures;

use App\Entity\Player;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
           $players = Array();
           for ($i = 0; $i < 20; $i++) {
               $players[$i] = new Player();
               $players[$i]->setName($faker->unique()->firstName());
               $players[$i]->setAttack($faker->numberBetween(1, 100));
               $players[$i]->setDefense($faker->numberBetween(1, 100));
               $manager->persist($players[$i]);
           }
        $manager->flush();
    }
}
