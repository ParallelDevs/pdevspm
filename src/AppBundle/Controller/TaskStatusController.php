<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\TaskStatus;
use AppBundle\Form\TaskStatusType;

/**
 * TaskStatus controller.
 *
 * @Route("/app/config/task/status")
 */
class TaskStatusController extends Controller
{

    /**
     * Lists all TaskStatus entities.
     *
     * @Route("/", name="config_task_status")
     * @Method("GET")
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:TaskStatus')->findAll();

        return $this->render('TaskStatus/index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new TaskStatus entity.
     *
     * @Route("/", name="config_task_status_create")
     * @Method("POST")
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TaskStatus();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('config_task_status_show', array('id' => $entity->getId())));
        }

        return $this->render('TaskStatus/new.html.twig',[
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * Creates a form to create a TaskStatus entity.
     *
     * @param TaskStatus $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TaskStatus $entity)
    {
        $form = $this->createForm(new TaskStatusType(), $entity, array(
            'action' => $this->generateUrl('config_task_status_create'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Displays a form to create a new TaskStatus entity.
     *
     * @Route("/new", name="config_task_status_new")
     * @Method("GET")
     *
     */
    public function newAction()
    {
        $entity = new TaskStatus();
        $form   = $this->createCreateForm($entity);

        return $this->render('TaskStatus/new.html.twig', [
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a TaskStatus entity.
     *
     * @Route("/{id}", name="config_task_status_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskStatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskStatus entity.');
        }

        return $this->render('TaskStatus/show.html.twig',[
            'entity' => $entity,
            'id'=>$entity->getId(),
            ]);
    }

    /**
     * Displays a form to edit an existing TaskStatus entity.
     *
     * @Route("/{id}/edit", name="config_task_status_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskStatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskStatus entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('TaskStatus/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),

        ]);
    }

    /**
    * Creates a form to edit a TaskStatus entity.
    *
    * @param TaskStatus $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TaskStatus $entity)
    {
        $form = $this->createForm(new TaskStatusType(), $entity, array(
            'action' => $this->generateUrl('config_task_status_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TaskStatus entity.
     *
     * @Route("/{id}", name="config_task_status_update")
     * @Method("PUT")
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskStatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskStatus entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('config_task_status_edit', array('id' => $id)));
        }

        return $this->render('TaskStatus/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),

        ]);
    }
    /**
     * Deletes a TaskStatus entity.
     *
     * @Route("/{id}/delete", name="config_task_status_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:TaskStatus')->find($id);

        if (!$entity) {
           throw $this->createNotFoundException('Unable to find TaskStatus entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('config_task_status'));
    }
}
