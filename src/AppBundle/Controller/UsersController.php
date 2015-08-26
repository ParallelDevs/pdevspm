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
     * @Route("/users/{id}/edit", name="edit_users")        
     */
    public function editUserAction($id){
        
        
        $em = $this->getDoctrine()->getManager(); 
        $user = $em->getRepository('AppBundle:Users')->find($id);
        
        //This section are in process. This code its for test. Ignore. 
       /* echo '<pre>';
        
        print_r($user);
        
        echo '</pre>';*/
        
         if (!$user) {
                throw $this->createNotFoundException('Dont find User, any matches for this ID');
            }//End IF
        
        $form = $this->createForm(new UserType(), $user, ['method' => 'POST', 'action' => $this->generateUrl('create_new_users')]);
        
        return $this->render('users/createNewUser.html.twig', ['form' => $form->createView()]);      
        /**$form->handleRequest($request);
        
        if($form->isValid()){
            
            echo 'Ingresa al IF DE VALIDAR EL FORM';
            $em->persist($user);
            $em->flush();
            
            echo 'Ya paso el FLUSH';
            
            return new Response('Your changes was aceptted. Check your new information');
            
        }//End IF*/ 
           
    }//End Function
}//End class UserController