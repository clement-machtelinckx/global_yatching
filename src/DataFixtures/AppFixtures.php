<?php

namespace App\DataFixtures;

use App\Entity\Boat;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        for ( $i = 0;$i < 10; $i++){

        // Boat (name, loa, beam, draft, year, builder, material, accomodation, engines, boatRange, cruiseSpeed, maxSpeed, price
        $boat = new Boat();
        $boat->setName('Bateau 1');
        $boat->setLoa(mt_rand(0, 100));
        $boat->setBeam(mt_rand(0, 10));
        $boat->setDraft(mt_rand(0, 5));
        $boat->setYear(new \DateTimeImmutable('2020-01-01'));
        $boat->setBuilder('Builder 1');
        $boat->setMaterial('Material 1');
        $boat->setAccomodation(mt_rand(0, 10));
        $boat->setEngines('Engines 1');
        $boat->setBoatRange(mt_rand(100, 1000));
        $boat->setCruiseSpeed(mt_rand(15, 20));
        $boat->setMaxSpeed(mt_rand(20, 25));
        $boat->setPrice(mt_rand(10000, 1000000));

        $manager->persist($boat);
        }


        $manager->flush();
    }
}
