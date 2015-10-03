<?php

namespace AppBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use AppBundle\Entity\User;

class UserRepositoryFunctionalTest extends KernelTestCase
{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;
    }

    public function testUserCreation()
    {
        $testUser = new User();
        $testUser
            ->setUsername('test')
            ->setName('Test User')
            ->setUsernameCanonical('test')
            ->setEmail('test@pdevspm.com')
            ->setEmailCanonical('test@pdevspm.com')
            ->setEnabled(true)
            ->setPlainPassword('test')
        ;
        $this->em->persist($testUser);
        $this->em->flush();
    }

    /**
     * Make sure there is an admin user to make test
     */
    public function testGetAdminUser()
    {
        $user = $this->em
            ->getRepository('AppBundle:User')
            ->findOneByName('admin')
        ;

        $this->assertEquals('admin', $user->getUserName());
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
    }
}