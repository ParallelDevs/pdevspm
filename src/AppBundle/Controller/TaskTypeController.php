<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\TaskType;
use AppBundle\Form\TaskTypeType;

/**
 * TaskType controller.
 *
 * @Route("/app/config/task/type")
 */
class TaskTypeController extends Controller
{

    /**
     * Lists all TaskType entities.
     *
     * @Route("/", name="config_task_type")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:TaskType')->findAll();

        return $this->render('TaskType/index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new TaskType entity.
     *
     * @Route("/", name="config_task_type_create")
     * @Method("POST")
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

            return $this->redirect($this->generateUrl('config_task_type_show', ['id' => $entity->getId()]));
        }

        return $this->render('TaskType/new.html.twig',[
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);
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
            'action' => $this->generateUrl('config_task_type_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TaskType entity.
     *
     * @Route("/new", name="config_task_type_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new TaskType();
        $form   = $this->createCreateForm($entity);

        return $this->render('TaskType/new.html.twig', [
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a TaskType entity.
     *
     * @Route("/{id}", name="config_task_type_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TaskType/show.html.twig',[
            'entity' => $entity,
            'id'=>$entity->getId(),
            'delete_form' => $deleteForm->createView()
        ]);

    }

    /**
     * Displays a form to edit an existing TaskType entity.
     *
     * @Route("/{id}/edit", name="config_task_type_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskType entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('TaskType/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),

        ]);
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
            'action' => $this->generateUrl('config_task_type_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TaskType entity.
     *
     * @Route("/{id}", name="config_task_type_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskType entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('config_task_type_edit', array('id' => $id)));
        }

        return $this->render('TaskType/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),

        ]);
    }
    /**
     * Deletes a TaskType entity.
     *
     * @Route("/{id}/delete", name="config_task_type_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:TaskType')->find($id);

        if (!$entity) {
             throw $this->createNotFoundException('Unable to find TaskType entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('config_task_type'));
    }
    /**
     * Creates a form to delete a Project entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('config_task_type_delete', ['id' => $id]))
            ->setMethod('DELETE')
            ->add('submit', 'submit', ['label' => 'Delete'])
            ->getForm()
            ;
    }

}
