<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Users;
use AppBundle\Entity\UsersGroups;
use AppBundle\Form\Type\UserType;

class UsersController extends Controller
{
    
     /**
     * @Route("/users", name="list_all_users")       
     */
    public function getAllUsersAction(){
        
        $repository = $this->getDoctrine()
        ->getRepository('AppBundle:Users');
        
        $users = $repository->findAll();      
        
        return $this->render('users/listAllUsers.html.twig', ['users' => $users]);      
        
    }//end Function
    
    /**
     * @Route("/users/create/view", name="create_new_users")        
     */
    public function createNewUserAction(){  
        
        $user = new Users();

        /*Its created the form view of Users with path containing the view*/
        $form = $this->createForm(new UserType(), $user, ['method' => 'POST', 'action' => $this->generateUrl('create_new_users')]);

        return $this->render('users/createNewUser.html.twig', ['form' => $form->createView()]);      
        
    }//End Function
      
     /**
     * @Route("/users/add/newuser", name="add_new_users")        
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
                    ->getRepository('AppBundle:UsersGroups') 
                    ->find($idUser);                
                //Set get the data into fields. 
                $users->setUsersGroup($usersGroupId);
                $users->setName($request->request->get('user')['name']);
                $users->setPhoto($request->request->get('user')['photo']);
                $users->setEmail($request->request->get('user')['email']);
                $users->setCulture('en');
                $users->setPassword($request->request->get('user')['password']);
                $users->setActive(false); 
                $users->setSkin(true);
                //Save the information from Fields.
                
                //Process the upload file in the form.
                //$users->upload();
                
                $em->persist($users);
                
                $em->flush();
                $url = $this->generateUrl('add_new_users');        
                return $this->redirect($url);                
            }//End IF 
            
             $repository = $this->getDoctrine()
                    ->getRepository('AppBundle:Users');
        
             $users = $repository->findAll();      
        
        return $this->render('users/listAllUsers.html.twig', ['users' => $users]);      
        
    }//End Function addNewUserAction  
    
    /**
     * @Route("/users/{id}/delete", name="delete_users")        
     */
    public function deleteUserAction($id){        
       
            $em = $this->getDoctrine()->getEntityManager();
            $user = $em->getRepository('AppBundle:Users')->find($id);
            
            if (!$user) {
                throw $this->createNotFoundException('Dont find User, any matches for this ID');
            }//End IF
            
            $em->remove($user);
            $em->flush();       
            
        return $this->redirect($this->generateUrl('list_all_users'));
    }//End Function
    
    /**
     * This function renderize the form with the data into the fields before update information. 
    * @Route("/users/{id}/edit", name="edit_users")        
    */
    public function editUserAction($id){        
                
        $em = $this->getDoctrine()->getManager(); 
        $user = $em->getRepository('AppBundle:Users')->find($id);
        /*Its created the form view of Users with path containing the view*/
        $form = $this->createForm(new UserType(), $user);
        return $this->render('users/editUser.html.twig', ['form' => $form->createView(),'id_user'=>$user->getId()]);       
           
    }//End Function
    
    /**
     * This function update the new information.  
     * @Route("/users/{id}/update", name="add_edit_user")        
     */
    public function processEditUserAction($id, Request $request){        
        
        $em = $this->getDoctrine()->getManager(); 
        $user = $em->getRepository('AppBundle:Users')->find($id);
        
        $repository = $this->getDoctrine()
        ->getRepository('AppBundle:Users');
        
        if($user) {
            
            $idUserGroup = $request->request->get('user')['usersGroup'];             
            $user->setActive($request->request->get('user')['active']);
            $user->setName($request->request->get('user')['name']);
            $user->setPassword($request->request->get('user')['password']);
            $user->setEmail($request->request->get('user')['email']);
            $usersGroupId = $this->getDoctrine()
                    ->getRepository('AppBundle:UsersGroups') 
                    ->find($idUserGroup);
            $user->setUsersGroup($usersGroupId);
            $user->setPhoto($request->request->get('user')['photo']);
            
            $em->persist($user);
            $em->flush(); 
        }
 
        $users = $repository->findAll();
        return $this->redirect($this->generateUrl('list_all_users'));           
        
    }//End Function
    
}//End class UserController