<?php

namespace App\DataFixtures;
use App\Factory\UserFactory;
use App\Factory\FilmFactory;
use App\Factory\ReservationFactory;
use App\Factory\ProjectionFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        FilmFactory::createMany(5);
        ProjectionFactory::createMany(10);
        UserFactory::createMany(10);
        ReservationFactory::createMany(20);
        $manager->flush();
    }
}
