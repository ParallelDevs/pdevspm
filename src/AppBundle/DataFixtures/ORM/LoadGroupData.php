<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Group;

class LoadGroupData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $admin = new Group('Admin');
        $admin->addRole('ROLE_SUPER_ADMIN');
        $admin
            ->setViewAll(1)
            ->setManageProjects(1)
            ->setManageTasks(1)
            ->setManageTickets(1)
            ->setManageUser(1)
            ->setManageConfiguration(1)
            ->setManageDiscussions(1)
        ;
        $manager->persist($admin);
        $manager->flush();

        $developer = new Group('Developer');
        $developer
            ->setManageProjects(1)
            ->setManageTasks(1)
        ;
        $manager->persist($developer);
        $manager->flush();

        $client = new Group('Client');
        $client
            ->setManageTickets(1)
        ;
        $manager->persist($client);
        $manager->flush();

        $manager_group = new Group('Manager');
        $manager_group
            ->setViewAll(1)
            ->setManageProjects(1)
            ->setManageTasks(1)
            ->setManageTickets(1)
            ->setManageUser(1)
        ;
        $manager->persist($manager_group);
        $manager->flush();

        $designer = new Group('Designer');
        $designer
            ->setManageTasks(1)
        ;
        $manager->persist($designer);
        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
