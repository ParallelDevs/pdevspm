<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\ProjectStatus;

class LoadProjectStatusData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $open = new ProjectStatus();
        $open
            ->setName('Open')
            ->setDefaultValue(1)
            ->setSortOrder(0)
            ->setActive(1)
        ;
        $manager->persist($open);

        $onHold = new ProjectStatus();
        $onHold
            ->setName('On Hold')
            ->setSortOrder(1)
            ->setActive(1)
        ;
        $manager->persist($onHold);

        $closed = new ProjectStatus();
        $closed
            ->setName('Closed')
            ->setSortOrder(2)
            ->setActive(1)
        ;
        $manager->persist($closed);

        $cancelled = new ProjectStatus();
        $cancelled
            ->setName('Cancelled')
            ->setSortOrder(3)
            ->setActive(1)
        ;
        $manager->persist($cancelled);

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 2;
    }
}
