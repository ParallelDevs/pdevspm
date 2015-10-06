<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\ProjectStatus;
use AppBundle\Form\Type\ProjectStatusType;

/**
 * ProjectStatus controller.
 *
 * @Route("/app/config/project/status")
 */
class ProjectStatusController extends Controller
{

    /**
     * Lists all ProjectStatus entities.
     *
     * @Route("/", name="config_project_status")
     * @Method("GET")
     * 
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:ProjectStatus')->findAll();

        return $this->render('ProjectStatus/index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new ProjectStatus entity.
     *
     * @Route("/", name="config_project_status_create")
     * @Method("POST")
     * 
     */
    public function createAction(Request $request)
    {
        $entity = new ProjectStatus();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            return $this->redirect($this->generateUrl('config_project_status_show', ['id' => $entity->getId()]));
        }

        return $this->render('ProjectStatus/new.html.twig',[
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);        
    }

    /**
     * Creates a form to create a ProjectStatus entity.
     *
     * @param ProjectStatus $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ProjectStatus $entity)
    {
        $form = $this->createForm(new ProjectStatusType(), $entity, array(
            'action' => $this->generateUrl('config_project_status_create'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Displays a form to create a new ProjectStatus entity.
     *
     * @Route("/new", name="config_project_status_new")
     * @Method("GET")
     * 
     */
    public function newAction()
    {
        $entity = new ProjectStatus();
        $form   = $this->createCreateForm($entity);

        return $this->render('ProjectStatus/new.html.twig', [
            'entity' => $entity,
            'form'   => $form->createView(),
        ]); 
    }

    /**
     * Finds and displays a ProjectStatus entity.
     *
     * @Route("/{id}", name="config_project_status_show")
     * @Method("GET")
     * 
     */
    public function showAction($id)
    {
        $repository = $this->getDoctrine()
                    ->getRepository('AppBundle:ProjectStatus');        
        $entity = $repository->find($id);  

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projects entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        
        return $this->render('ProjectStatus/show.html.twig', 
                 ['entity' => $entity, 
                  'id'=>$entity->getId(), 
                  'delete_form' => $deleteForm->createView()]);
    }

    /**
     * Displays a form to edit an existing ProjectStatus entity.
     *
     * @Route("/{id}/edit", name="config_project_status_edit")
     * @Method("GET")
     * 
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ProjectStatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Project entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjectStatus/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
    * Creates a form to edit a ProjectStatus entity.
    *
    * @param ProjectStatus $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ProjectStatus $entity)
    {
        $form = $this->createForm(new ProjectStatusType(), $entity, array(
            'action' => $this->generateUrl('config_project_status_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }
    /**
     * Edits an existing ProjectStatus entity.
     *
     * @Route("/{id}", name="config_project_status_update")
     * @Method("PUT")
     * 
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ProjectStatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProjectStatus entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            
            return $this->redirect($this->generateUrl('config_project_status_edit', ['id' => $id]));
        }

        return $this->render('ProjectStatus/edit.html.twig', [
          'entity'      => $entity,
          'edit_form'   => $editForm->createView(),
          'delete_form' => $deleteForm->createView(),
        ]);
    }
    /**
     * Deletes a ProjectStatus entity.
     *
     * @Route("/{id}", name="config_project_status_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:ProjectStatus')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProjectStatus entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('config_project_status'));
    }

    /**
     * Creates a form to delete a ProjectStatus entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('config_project_status_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
