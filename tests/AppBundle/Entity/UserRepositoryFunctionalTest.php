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
     * {@inheritdoc}
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

        $this->assertNotNull($user);
        $this->assertInstanceOf('AppBundle\Entity\User', $user);
        $this->assertEquals('test', $user->getUsername());
        $this->assertEquals('test@pdevspm.com', $user->getEmail());
        $this->assertTrue($user->isEnabled());
        $this->assertNotEquals('test', $user->getPassword());
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
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
    }
}
