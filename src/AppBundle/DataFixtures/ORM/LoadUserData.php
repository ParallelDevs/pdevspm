<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        // Create an admin user for test only
        if ($this->container->getParameter('kernel.environment') == 'test') {
            $this->addAdminUser($manager);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 2;
    }

    /**
     * @param ObjectManager $manager
     */
    private function addAdminUser(ObjectManager $manager)
    {
        $adminGroup = $manager->getRepository('AppBundle:UserGroup')->findOneByName('Admin');

        $adminUser = new User();
        $adminUser->addGroup($adminGroup);
        $adminUser
            ->setUsername('admin')
            ->setUsernameCanonical('admin')
            ->setEmail('admin@pdevspm.com')
            ->setEmailCanonical('admin@pdevspm.com')
            ->setEnabled(true)
            ->setPlainPassword('admin')
        ;

        $manager->persist($adminUser);
        $manager->flush();
    }
}
