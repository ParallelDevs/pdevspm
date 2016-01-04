<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\ProjectStatus;

class LoadProjectStatusData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $open = new ProjectStatus();
        $open
            ->setName('Open')
            ->setDefaultValue(true)
            ->setSortOrder(0)
            ->setActive(true);
        ;
        $manager->persist($open);
        $manager->flush();

        $onHold = new ProjectStatus();
        $onHold
            ->setName('On Hold')
            ->setSortOrder(1)
            ->setActive(true);
        ;
        $manager->persist($onHold);
        $manager->flush();

        $closed = new ProjectStatus();
        $closed
            ->setName('Closed')
            ->setDefaultValue(true)
            ->setSortOrder(2)
            ->setActive(true);
        ;
        $manager->persist($closed);
        $manager->flush();

        $cancelled = new ProjectStatus();
        $cancelled
            ->setName('Cancelled')
            ->setDefaultValue(true)
            ->setSortOrder(3)
            ->setActive(true);
        ;
        $manager->persist($cancelled);
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}