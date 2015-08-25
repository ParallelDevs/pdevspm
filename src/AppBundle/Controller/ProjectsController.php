<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Projects;
use AppBundle\Form\ProjectsType;

/**
 * Projects controller.
 *
 * @Route("/projects")
 */
class ProjectsController extends Controller
{

    /**
     * Lists all Projects entities.
     *
     * @Route("/list", name="projects_list")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Projects')->findAll();

        return $this->render('projects/show.html.twig', ['entities' => $entities->createView()]);
    }
    /**
     * Creates a new Projects entity.
     *
     * @Route("/create", name="projects_create")
     * @Method("POST") 
     */
    public function createAction(Request $request)
    {
        $entity = new Projects();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('projects_show', array('id' => $entity->getId())));
        }

        return $this->render('projects/show.html.twig', ['entity' => $entity->createView(), 'form'   => $form->createView(),]);
        
        /*return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );*/
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
        $form = $this->createForm(new ProjectsType(), $entity, array(
            'action' => $this->generateUrl('projects_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
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
        
        return $this->render('projects/new.html.twig', ['entity' => $entity->createView(), 'form'   => $form->createView(),]);
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

        $entity = $em->getRepository('AppBundle:Projects')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projects entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        
        return $this->render('projects/show.html.twig', ['entity' => $entity->createView(), 'delete_form'   => $deleteForm->createView(),]);
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

        $entity = $em->getRepository('AppBundle:Projects')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projects entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
            
        return $this->render('projects/new.html.twig', ['entity' => $entity->createView(), 
            'edit_form'   => $editForm->createView(),
            'delete_form'   => $deleteForm->createView(),]);
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
        $form = $this->createForm(new ProjectsType(), $entity, array(
            'action' => $this->generateUrl('projects_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Projects entity.
     *
     * @Route("/{id}", name="projects_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Projects')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projects entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('projects_edit', array('id' => $id)));
        }

        return $this->render('projects/new.html.twig', ['entity' => $entity->createView(), 
            'edit_form'   => $editForm->createView(),
            'delete_form'   => $deleteForm->createView(),]);
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
                throw $this->createNotFoundException('Unable to find Projects entity.');
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
            ->setAction($this->generateUrl('projects_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
