<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Projects;
use AppBundle\Form\Type\ProjectType;

/**
 * Projects controller.
 *
 * @Route("/projects")
 */
class ProjectController extends Controller
{

    /**
     * Lists all Projects entities.
     *
     * @Route("/", name="projects")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $entities = $em->getRepository('AppBundle:Projects')->findAll();  
        
        return $this->render('Project/index.html.twig', [
                'entities' => $entities]);
    }
    /**
     * Creates a new Projects entity.
     *
     * @Route("/", name="projects_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();           
        $projects = new Projects();                 
        $form = $this->createCreateForm($projects);        
        $idProjectType = $request->request->get('projects')['projectsTypes'];            
        $idProjectsStatus = $request->request->get('projects')['projectsStatus'];           
        $optionsSelected = $request->request->get('projects')['team'];           
        $this->convertArrayIdUsers($request, $optionsSelected);            
        $options2 = implode("," , $optionsSelected); 
        $projects->setTeam($options2);            
        $idProjectsTypeItem = $this->getDoctrine()
                            ->getRepository('AppBundle:ProjectsTypes') 
                            ->find($idProjectType);             
        $idProjectStatusItem = $this->getDoctrine()
                            ->getRepository('AppBundle:ProjectsStatus') 
                            ->find($idProjectsStatus);           
        $projects->setName($request->request->get('projects')['name']);                        
        $projects->setDescription($request->request->get('projects')
                                                        ['description']);            
        $projects->setCreatedAt(new \DateTime($request->request
                            ->get('createdAt')));
        $idProjectUser = $request->request->get('projects')
                                                        ['createdBy'];             
        $idUser = $this->getDoctrine()
                            ->getRepository('AppBundle:Users') 
                            ->find($idProjectUser);            
        $projects->setCreatedBy($idUser);               
        $projects->setOrderTasksBy('TEXTO_PLANO');
        $projects->setProjectsStatus($idProjectStatusItem);          
        $projects->setProjectsTypes($idProjectsTypeItem);             
        $em->persist($projects);            
        $em->flush();
        $repository = $this->getDoctrine()->getRepository('AppBundle:Projects');
        $projects = $repository->findAll(); 
          
        return $this->render('Project/show.html.twig', ['form' => $form, 
                             'entity' => $projects]);           
    }
    /**
     * Creates a form to create a Projects entity.
     *
     * @param Projects $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Projects $entity)
    {
        $repository = $this->getDoctrine()
        ->getRepository('AppBundle:Users');
        
        $user = $repository->findAll();
        
        $form = $this->createForm(new ProjectType(), $entity, 
                        ['method' => 'POST', 'action' => 
                            $this->generateUrl('projects_create')]);
        
        return $this->render('Project/new.html.twig', 
                        ['form' => $form->createView(), 'users' => $user]);
    }

    /**
     * Displays a form to create a new Projects entity.
     *
     * @Route("/new", name="projects_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new Projects();
        
        $form   = $this->createCreateForm($entity);

        return $form;
    }
    /**
     * Convert the Array collection to String values separates with comma. 
     *
     */
   public function convertArrayIdUsers(Request $request, Array $optionsSelected) {
        
            foreach ($optionsSelected as $value) {                
              if(is_object($value)){                  
                $coma = ',';                
                $optionsSelected .= $coma.$value;                  
              }
            }
    }
    /**
     * Finds and displays a Projects entity.
     *
     * @Route("/{id}", name="projects_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();        
        
        $repository = $this->getDoctrine()
                    ->getRepository('AppBundle:Projects');        
        $entity = $repository->find($id);  

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projects entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        
        return $this->render('Project/show.html.twig', 
                 ['entity' => $entity, 
                  'id'=>$entity->getId(), 
                  'delete_form' => $deleteForm->createView()]);
    }

    /**
     * Displays a form to edit an existing Projects entity.
     *
     * @Route("/{id}/edit", name="projects_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager(); 
        $projects = $em->getRepository('AppBundle:Projects')->find($id);        
        $users = $em->getRepository('AppBundle:Users')->find($id);
        $repository = $this->getDoctrine()
        ->getRepository('AppBundle:Users');        
        $user = $repository->findAll();        
        
        
        $options = explode(',' , $projects->getTeam());
                
        $editForm = $this->createEditForm($projects);
        $deleteForm = $this->createDeleteForm($id);
                
        return $this->render('Project/edit.html.twig', [
          'entity'      => $projects,
          'edit_form'   => $editForm->createView(),
          'delete_form' => $deleteForm->createView(),
          'id_project' => $id,
          'users' => $user,
          'options' => $options
        ]);
        
    }

    /**
    * Creates a form to edit a Projects entity.
    *
    * @param Projects $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Projects $entity)
    {
        
        $form = $this->createForm(new ProjectType(), $entity, [
            'action' => $this->generateUrl('projects_update', [
                'id' => $entity->getId()]),
            'method' => 'PUT',
        ]);

        $form->add('submit', 'submit', ['label' => 'Update']);

        return $form;
        
    }
    /**
     * Edits an existing Projects entity.
     *
     * @Route("/{id}", name="projects_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager(); 
        $projects = $em->getRepository('AppBundle:Projects')->find($id);        
        $repository = $this->getDoctrine()
        ->getRepository('AppBundle:Projects');
             
        if (!$projects) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }
       
            $idProjectType = $request->request->get('projects')['projectsTypes'];            
            
            $idProjectsStatus = $request->request->get('projects')['projectsStatus'];
           
            $optionsSelected = $request->request->get('projects')['team'];           
            $this->convertArrayIdUsers($request, $optionsSelected);            
            $options = implode("," , $optionsSelected); 
            $projects->setTeam($options);
                                             
            $idProjectsTypeItem = $this->getDoctrine()
                    ->getRepository('AppBundle:ProjectsTypes') 
                    ->find($idProjectType);
            $idProjectStatusItem = $this->getDoctrine()
                    ->getRepository('AppBundle:ProjectsStatus') 
                    ->find($idProjectsStatus);
            $projects->setName($request->request->get('projects')['name']);
            $projects->setDescription($request->request->get('projects')
                    ['description']);                     
            $projects->setCreatedAt(new \DateTime($request->request
                    ->get('createdAt')));                                   
            $projects->setOrderTasksBy('TEXTO_PLANO');
            $projects->setProjectsStatus($idProjectStatusItem);          
            $projects->setProjectsTypes($idProjectsTypeItem);            
            $em->persist($projects);            
            $em->flush();                       
         
        
            $repository = $this->getDoctrine()
                    ->getRepository('AppBundle:Users');        
            $users = $repository->findAll(); 
            
            $editForm = $this->createEditForm($projects);
            $deleteForm = $this->createDeleteForm($id);
                
        return $this->render('Project/edit.html.twig', [
                'entity'      => $projects,
                'edit_form'   => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
                'users' => $users,
                'options' => $options
          ]);
          
    }
    /**
     * Deletes a Projects entity.
     *
     * @Route("/{id}", name="projects_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
         $form = $this->createDeleteForm($id);
         $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Projects')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Project entity.');
            }
            
            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('projects'));
    }
    /**
     * Creates a form to delete a Projects entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projects_delete',
                        array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
