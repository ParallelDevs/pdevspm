<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\ProjectType;
use AppBundle\Form\Type\ProjectTypeType;

/**
 * ProjectType controller.
 *
 * @Route("/app/config/project/type")
 */
class ProjectTypeController extends Controller
{

    /**
     * Lists all ProjectType entities.
     *
     * @Route("/", name="config_project_type")
     * @Method("GET")
     * 
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:ProjectType')->findAll();

        return $this->render('ProjectType/index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new ProjectType entity.
     *
     * @Route("/", name="config_project_type_create")
     * @Method("POST")
     * 
     */
    public function createAction(Request $request)
    {
        $entity = new ProjectType();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('config_project_type_show', ['id' => $entity->getId()]));
        }

         return $this->render('ProjectType/new.html.twig',[
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);   
    }

    /**
     * Creates a form to create a ProjectType entity.
     *
     * @param ProjectType $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ProjectType $entity)
    {
        $form = $this->createForm(new ProjectTypeType(), $entity, array(
            'action' => $this->generateUrl('config_project_type_create'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Displays a form to create a new ProjectType entity.
     *
     * @Route("/new", name="config_project_type_new")
     * @Method("GET")
     * 
     */
    public function newAction()
    {
        $entity = new ProjectType();
        $form   = $this->createCreateForm($entity);

         return $this->render('ProjectType/new.html.twig', [
            'entity' => $entity,
            'form'   => $form->createView(),
        ]); 
    }

    /**
     * Finds and displays a ProjectType entity.
     *
     * @Route("/{id}", name="config_project_type_show")
     * @Method("GET")
     * 
     */
    public function showAction($id)
    {
        $repository = $this->getDoctrine()
                    ->getRepository('AppBundle:ProjectType');   
        
        $entity = $repository->find($id);  

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projects entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        
        return $this->render('ProjectType/show.html.twig', 
                 ['entity' => $entity, 
                  'id'=>$entity->getId(), 
                  'delete_form' => $deleteForm->createView()]);
    }

    /**
     * Displays a form to edit an existing ProjectType entity.
     *
     * @Route("/{id}/edit", name="config_project_type_edit")
     * @Method("GET")
     * 
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ProjectType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Project entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProjectType/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
    * Creates a form to edit a ProjectType entity.
    *
    * @param ProjectType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ProjectType $entity)
    {
        $form = $this->createForm(new ProjectTypeType(), $entity, array(
            'action' => $this->generateUrl('config_project_type_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }
    /**
     * Edits an existing ProjectType entity.
     *
     * @Route("/{id}", name="config_project_type_update")
     * @Method("PUT")
     * 
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ProjectType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProjectType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('config_project_type_edit', ['id' => $id]));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ProjectType entity.
     *
     * @Route("/{id}", name="config_project_type_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:ProjectType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProjectType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('config_project_type'));
    }

    /**
     * Creates a form to delete a ProjectType entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('config_project_type_delete', ['id' => $id]))
            ->setMethod('DELETE')
            ->add('submit', 'submit', ['label' => 'Delete'])
            ->getForm()
        ;
    }
}
