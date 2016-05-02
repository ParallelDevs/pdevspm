<?php

namespace AppBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use AppBundle\Entity\UserGroup;

class GroupRepositoryFunctionalTest extends KernelTestCase
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

    public function testGroupCreation()
    {
        $testGroup = new UserGroup('Test Group');

        $this->em->persist($testGroup);
        $this->em->flush();

        $group = $this->em
            ->getRepository('AppBundle:UserGroup')
            ->findOneByName('Test Group')
        ;

        $this->assertNotNull($group);
        $this->assertInstanceOf('AppBundle\Entity\UserGroup', $group);
        $this->assertEquals('Test Group', $group->getName());
        $this->assertTrue($group->hasRole('ROLE_USER'));
    }

    public function testUpdateGroup()
    {
        $testGroup = $this->em
            ->getRepository('AppBundle:UserGroup')
            ->findOneByName('Test Group')
        ;

        $this->assertNotNull($testGroup);
        $this->assertInstanceOf('AppBundle\Entity\UserGroup', $testGroup);
        $testGroup->setName('Test Group two');

        $this->em->persist($testGroup);
        $this->em->flush();

        $group = $this->em
            ->getRepository('AppBundle:UserGroup')
            ->findOneByName('Test Group two')
        ;

        $this->assertNotNull($group);
        $this->assertInstanceOf('AppBundle\Entity\UserGroup', $group);
        $this->assertEquals('Test Group two', $group->getName());
    }

    public function testDeleteGroup()
    {
        $testGroup = $this->em
            ->getRepository('AppBundle:UserGroup')
            ->findOneByName('Test Group two')
        ;

        $this->assertNotNull($testGroup);
        $this->assertInstanceOf('AppBundle\Entity\UserGroup', $testGroup);

        $this->em->remove($testGroup);
        $this->em->flush();

        $group = $this->em
            ->getRepository('AppBundle:UserGroup')
            ->findOneByName('Test Group two')
        ;

        $this->assertNull($group);
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
