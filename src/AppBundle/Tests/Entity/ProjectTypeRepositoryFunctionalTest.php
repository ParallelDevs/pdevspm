<?php

namespace AppBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use AppBundle\Entity\ProjectType;

class ProjectTypeRepositoryFunctionalTest extends KernelTestCase
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

    public function testCreateProjectType()
    {
        $testProjectType = new ProjectType();
        $testProjectType
            ->setName('Project Type Test')
            ->setSortOrder(10)
            ->setActive(1);

        $this->em->persist($testProjectType);
        $this->em->flush();

        $projectType = $this->em
            ->getRepository('AppBundle:ProjectType')
            ->findOneByName('Project Type Test');

        $this->assertNotNull($projectType);
        $this->assertInstanceOf('AppBundle\Entity\ProjectType', $projectType);
        $this->assertEquals('Project Type Test', $projectType->getName());
        $this->assertEquals(10, $projectType->getSortOrder());
        $this->assertEquals(1, $projectType->getActive());
    }

    public function testUpdateProjectType()
    {
        $projectType = $this->em
            ->getRepository('AppBundle:ProjectType')
            ->findOneByName('Project Type Test');

        $projectType
            ->setName('Project Type Test 2')
            ->setSortOrder(77)
            ->setActive(0);

        $this->em->persist($projectType);
        $this->em->flush();

        $projectType2 = $this->em
            ->getRepository('AppBundle:ProjectType')
            ->findOneByName('Project Type Test 2');

        $this->assertNotNull($projectType2);
        $this->assertInstanceOf('AppBundle\Entity\ProjectType', $projectType2);
        $this->assertEquals('Project Type Test 2', $projectType2->getName());
        $this->assertEquals(77, $projectType2->getSortOrder());
        $this->assertEquals(0, $projectType2->getActive());
    }

    public function testDeleteProjectType()
    {
        $projectType = $this->em
            ->getRepository('AppBundle:ProjectType')
            ->findOneByName('Project Type Test 2');

        $this->em->remove($projectType);
        $this->em->flush();

        $projectTypeDeleted = $this->em
            ->getRepository('AppBundle:ProjectType')
            ->findOneByName('Project Type Test 2');

        $this->assertNull($projectTypeDeleted);
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
