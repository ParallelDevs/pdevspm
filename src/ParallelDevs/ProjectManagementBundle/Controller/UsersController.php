<?php

namespace ParallelDevs\ProjectManagementBundle\Controller;


use ParallelDevs\ProjectManagementBundle\Entity\Users;
use ParallelDevs\ProjectManagementBundle\Entity\UsersGroups;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ParallelDevs\ProjectManagementBundle\Form\Type\UserType;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends Controller
{
     /*
     * Function: getAllUsersAction
     * In this function getted the all list of users.
     *       
     */
    public function getAllUsersAction(){
        
        $repository = $this->getDoctrine()
        ->getRepository('ParallelDevsProjectManagementBundle:Users');
        
        $users = $repository->findAll();      
        
        return $this->render('ParallelDevsProjectManagementBundle:Users:listUsersView.html.twig', ['users' => $users]);      
        
    }//end Function
    
    /*
     * Function: createNewUserAction
     * In this function performed the form of adding users.
     *       
     */
    public function createNewUserAction(){  
        
        $user = new Users();
        
        /*Its created the form view of Users with path containing the view*/
        $form = $this->createForm(new UserType(), $user, ['method' => 'POST', 'action' => $this->generateUrl('parallel_devs_project_management_create_new_users')]);
        
        return $this->render('ParallelDevsProjectManagementBundle:Users:createNewUserView.html.twig', ['form' => $form->createView()]);      
        
    }//End Function
    
    /*
     * Function: processUserFormAction
     * In this function performed the form of adding users.
     *       
     */
    public function processUserFormAction(Request $request){
        
        if ($request->getMethod() == 'POST') {
                                
                $em = $this->getDoctrine()->getManager();                
                
                //Instance and created the new Objects
                $users = new Users(); 
                $usersGroup = new UsersGroups(); 
                
                //Get the attribute Id from Entity User
                $idUser = $request->request->get('user')['usersGroup'];                
                
                //Get the id and realice the query and obteining id.  
                $usersGroupId = $this->getDoctrine()
                    ->getRepository('ParallelDevsProjectManagementBundle:UsersGroups') 
                    ->find($idUser);                
                //Set get the data into fields. 
                $users->setUsersGroup($usersGroupId);
                $users->setName($request->request->get('user')['name']);
                $users->setPhoto($request->request->get('user')['photo']);
                $users->setEmail($request->request->get('user')['email']);
                $users->setCulture('en');
                $users->setPassword($request->request->get('user')['password']);
                $users->setActive(true);
                $users->setSkin(true);
                //Save the information from Fields.
                $em->persist($users);
                
                $em->flush();

                $url = $this->generateUrl('parallel_devs_project_management_list_all_users');        
                return $this->redirect($url);
                
            }//End IF 
            
             $repository = $this->getDoctrine()
                    ->getRepository('ParallelDevsProjectManagementBundle:Users');
        
             $users = $repository->findAll();      
        
        return $this->render('ParallelDevsProjectManagementBundle:Users:listUsersView.html.twig', ['users' => $users]);      
        
    }//End Function addNewUserAction
    
}//End class UserController

