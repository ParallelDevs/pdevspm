<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\ProjectType;

class LoadProjectTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $support = new ProjectType();
        $support
          ->setName('Support')
          ->setSortOrder(0)
          ->setActive(true);
        ;
        $manager->persist($support);
        $manager->flush();

        $newSite = new ProjectType();
        $newSite
          ->setName('New Site')
          ->setSortOrder(1)
          ->setActive(true);
        ;
        $manager->persist($newSite);
        $manager->flush();

        $internal = new ProjectType();
        $internal
          ->setName('Internal')
          ->setSortOrder(2)
          ->setActive(true);
        ;
        $manager->persist($internal);
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}