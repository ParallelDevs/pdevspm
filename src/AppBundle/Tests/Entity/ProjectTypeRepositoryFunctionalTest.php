<?php

namespace AppBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProjectTypeRepositoryFunctionalTest extends KernelTestCase
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

    public function testSearchProjectByName()
    {
        $projectType = $this->em
            ->getRepository('AppBundle:ProjectType')
            ->findOneByName('Support')
        ;

        $this->assertEquals('Support', $projectType->getName());
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
