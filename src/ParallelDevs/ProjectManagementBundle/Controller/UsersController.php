<?php

namespace ParallelDevs\ProjectManagementBundle\Controller;


use ParallelDevs\ProjectManagementBundle\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ParallelDevs\ProjectManagementBundle\Form\Type\UserType;


class UsersController extends Controller
{
    public function getUserAction($id)
    {
         $user = $this->getDoctrine()
        ->getRepository('ParallelDevsProjectManagementBundle:Users')
        ->find($id);

    if (!$user) {
        throw $this->createNotFoundException(
            'Dont found user for id ' .$id
        );
    }   
        return $this->render('ParallelDevsProjectManagementBundle:Users:indexUserById.html.twig', array('user' => $user));
    }//End function
    
    public function getAllUsersAction(){
        
        $repository = $this->getDoctrine()
        ->getRepository('ParallelDevsProjectManagementBundle:Users');
        
        $users = $repository->findAll();      
        
        return $this->render('ParallelDevsProjectManagementBundle:Users:indexListUsers.html.twig', ['users' => $users]);      
        
    }//end Function
    
    public function createNewUserAction(){  
        
        $user = new Users();
        
        $form = $this->createForm(new UserType(), $user, ['method' => 'POST', 'action' => $this->generateUrl('parallel_devs_project_management_create_new_users')]);
        
        return $this->render('ParallelDevsProjectManagementBundle:Users:indexCreateNewUser.html.twig', ['form' => $form->createView()]);      
        
    }//End Function
}//End class UserController
