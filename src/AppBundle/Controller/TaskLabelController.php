<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\TaskLabel;
use AppBundle\Form\TaskLabelType;

/**
 * TaskLabel controller.
 *
 * @Route("/app/config/task/label")
 */
class TaskLabelController extends Controller
{

    /**
     * Lists all TaskLabel entities.
     *
     * @Route("/", name="config_task_label")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:TaskLabel')->findAll();

        return $this->render('TaskLabel/index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new TaskLabel entity.
     *
     * @Route("/", name="config_task_label_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new TaskLabel();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('config_task_label_show', array('id' => $entity->getId())));
        }

        return $this->render('TaskLabel/new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView()
        ]);
    }

    /**
     * Creates a form to create a TaskLabel entity.
     *
     * @param TaskLabel $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TaskLabel $entity)
    {
        $form = $this->createForm(new TaskLabelType(), $entity, array(
            'action' => $this->generateUrl('config_task_label_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TaskLabel entity.
     *
     * @Route("/new", name="config_task_label_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new TaskLabel();
        $form   = $this->createCreateForm($entity);

        return $this->render('TaskLabel/new.html.twig', [
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a TaskLabel entity.
     *
     * @Route("/{id}", name="config_task_label_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskLabel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskLabel entity.');
        }

        return $this->render('TaskLabel/show.html.twig',[
            'entity' => $entity,
            'id'=>$entity->getId(),
            ]);
    }

    /**
     * Displays a form to edit an existing TaskLabel entity.
     *
     * @Route("/{id}/edit", name="config_task_label_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskLabel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskLabel entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('TaskLabel/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),

        ]);
    }

    /**
    * Creates a form to edit a TaskLabel entity.
    *
    * @param TaskLabel $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TaskLabel $entity)
    {
        $form = $this->createForm(new TaskLabelType(), $entity, array(
            'action' => $this->generateUrl('config_task_label_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TaskLabel entity.
     *
     * @Route("/{id}", name="config_task_label_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskLabel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskLabel entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('config_task_label_edit', array('id' => $id)));
        }

        return $this->render('TaskType/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ]);
    }
    /**
     * Deletes a TaskLabel entity.
     *
     * @Route("/{id}/delete", name="config_task_label_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:TaskLabel')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TaskLabel entity.');
            }

            $em->remove($entity);
            $em->flush();

        return $this->redirect($this->generateUrl('config_task_label'));
    }

}
