<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\UserGroup;

class LoadUserGroupData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $admin = new UserGroup('Admin');
        $admin->addRole('ROLE_SUPER_ADMIN');
        $manager->persist($admin);
        $manager->flush();

        $developer = new UserGroup('Developer');
        $manager->persist($developer);
        $manager->flush();

        $client = new UserGroup('Client');
        $manager->persist($client);
        $manager->flush();

        $manager_group = new UserGroup('Manager');
        $manager->persist($manager_group);
        $manager->flush();

        $designer = new UserGroup('Designer');
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
