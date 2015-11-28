<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\ProjectType;

class LoadProjectTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $support = new ProjectType();
        $support
            ->setName('Support')
            ->setSortOrder(0)
            ->setActive(1);
        $manager->persist($support);

        $newSite = new ProjectType();
        $newSite
            ->setName('New Site')
            ->setSortOrder(1)
            ->setActive(1);
        $manager->persist($newSite);

        $internal = new ProjectType();
        $internal
            ->setName('Internal')
            ->setSortOrder(2)
            ->setActive(1);
        $manager->persist($internal);

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
