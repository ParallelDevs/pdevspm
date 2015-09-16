<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\TaskType;
use AppBundle\Form\TaskTypeType;

/**
 * TaskType controller.
 *
 * @Route("/tasktype")
 */
class TaskTypeController extends Controller
{

    /**
     * Lists all TaskType entities.
     *
     * @Route("/", name="tasktype")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:TaskType')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TaskType entity.
     *
     * @Route("/", name="tasktype_create")
     * @Method("POST")
     * @Template("AppBundle:TaskType:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TaskType();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tasktype_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a TaskType entity.
     *
     * @param TaskType $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TaskType $entity)
    {
        $form = $this->createForm(new TaskTypeType(), $entity, array(
            'action' => $this->generateUrl('tasktype_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TaskType entity.
     *
     * @Route("/new", name="tasktype_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TaskType();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TaskType entity.
     *
     * @Route("/{id}", name="tasktype_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TaskType entity.
     *
     * @Route("/{id}/edit", name="tasktype_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskType entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a TaskType entity.
    *
    * @param TaskType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TaskType $entity)
    {
        $form = $this->createForm(new TaskTypeType(), $entity, array(
            'action' => $this->generateUrl('tasktype_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TaskType entity.
     *
     * @Route("/{id}", name="tasktype_update")
     * @Method("PUT")
     * @Template("AppBundle:TaskType:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tasktype_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TaskType entity.
     *
     * @Route("/{id}", name="tasktype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:TaskType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TaskType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tasktype'));
    }

    /**
     * Creates a form to delete a TaskType entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tasktype_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
