<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\TaskPriority;
use AppBundle\Form\TaskPriorityType;

/**
 * TaskPriority controller.
 *
 * @Route("/app/config/task/priority")
 */
class TaskPriorityController extends Controller
{

    /**
     * Lists all TaskPriority entities.
     *
     * @Route("/", name="config_task_priority")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:TaskPriority')->findAll();

        return $this->render('TaskPriority/index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new TaskPriority entity.
     *
     * @Route("/", name="config_task_priority_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new TaskPriority();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('config_task_priority_show', ['id' => $entity->getId()]));
        }

        return $this->render('TaskPriority/new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView()
        ]);
    }

    /**
     * Creates a form to create a TaskPriority entity.
     *
     * @param TaskPriority $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TaskPriority $entity)
    {
        $form = $this->createForm(new TaskPriorityType(), $entity, array(
            'action' => $this->generateUrl('config_task_priority_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TaskPriority entity.
     *
     * @Route("/new", name="config_task_priority_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new TaskPriority();
        $form   = $this->createCreateForm($entity);

        return $this->render('TaskPriority/new.html.twig', [
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a TaskPriority entity.
     *
     * @Route("/{id}", name="config_task_priority_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskPriority')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskPriority entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TaskPriority/show.html.twig',[
            'entity' => $entity,
            'id'=>$entity->getId(),
            'delete_form' => $deleteForm->createView()
        ]);
    }

    /**
     * Displays a form to edit an existing TaskPriority entity.
     *
     * @Route("/{id}/edit", name="config_task_priority_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskPriority')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskPriority entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TaskPriority/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
    * Creates a form to edit a TaskPriority entity.
    *
    * @param TaskPriority $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TaskPriority $entity)
    {
        $form = $this->createForm(new TaskPriorityType(), $entity, array(
            'action' => $this->generateUrl('config_task_priority_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TaskPriority entity.
     *
     * @Route("/{id}", name="config_task_priority_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskPriority')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskPriority entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('config_task_priority_edit', array('id' => $id)));
        }

        return $this->render('TaskPriority/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }
    /**
     * Deletes a TaskPriority entity.
     *
     * @Route("/{id}/delete", name="config_task_priority_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:TaskPriority')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TaskPriority entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('config_task_priority'));
    }

    /**
     * Creates a form to delete a TaskPriority entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('config_task_priority_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
