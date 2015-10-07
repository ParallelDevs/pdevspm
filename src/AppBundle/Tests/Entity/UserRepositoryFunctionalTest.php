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

        $user = $this->em
            ->getRepository('AppBundle:User')
            ->findOneByEmail('test@pdevspm.com')
        ;

        $this->assertEquals('test@pdevspm.com', $user->getEmail());
    }

    public function testUpdateUser()
    {
        $user = $this->em
            ->getRepository('AppBundle:User')
            ->findOneByEmail('test@pdevspm.com')
        ;

        $this->assertEquals('test@pdevspm.com', $user->getEmail());

        // Update email
        $user->setEmail('test2@pdevspm.com');
        $this->assertEquals('test2@pdevspm.com', $user->getEmail());

        $this->em->persist($user);
        $this->em->flush();

        $user = $this->em
            ->getRepository('AppBundle:User')
            ->findOneByEmail('test2@pdevspm.com')
        ;

        $this->assertEquals('test2@pdevspm.com', $user->getEmail());
    }

    public function testDeleteUser()
    {
        $user = $this->em
            ->getRepository('AppBundle:User')
            ->findOneByEmail('test2@pdevspm.com')
        ;

        $this->assertEquals('test2@pdevspm.com', $user->getEmail());

        $this->em->remove($user);
        $this->em->flush();

        $user = $this->em
            ->getRepository('AppBundle:User')
            ->findOneByEmail('test2@pdevspm.com')
        ;

        $this->assertNull($user);
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
