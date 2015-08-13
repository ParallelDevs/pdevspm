<?php

namespace ParallelDevs\Bundle\ProjectManagementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ParallelDevsProjectManagementBundle:Default:index.html.twig', array('name' => $name));
    }
}
