<?php
/**
 * Created by PhpStorm.
 * User: danielnv18
 * Date: 10/2/15
 * Time: 11:18 PM
 */

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
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Create an admin user for test only
        if($this->container->getParameter("kernel.environment") == 'test')
        {
            $adminUser = new User();
            $adminUser
                ->addRole('ROLE_ADMIN')
                ->setUsername('admin')
                ->setName('admin')
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

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
