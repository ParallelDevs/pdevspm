<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\TaskGroup;
use AppBundle\Form\Type\TaskGroupType;

/**
 * TaskGroup controller.
 *
 * @Route("/app/project")
 */
class TaskGroupController extends Controller
{

    /**
     * Lists all TaskGroup entities.
     *
     * @Route("/{project_id}/task-group", name="config_task_group")
     * @Method("GET")
     *
     */
    public function indexAction($project_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:TaskGroup')->findByProject($project_id);

        return $this->render('TaskGroup/index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new TaskGroup entity.
     *
     * @Route("/{project_id}/task-group", name="config_task_group_create")
     * @Method("POST")
     *
     */
    public function createAction(Request $request, $project_id)
    {
        $entity = new TaskGroup();
        $form = $this->createCreateForm($entity, $project_id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $project= $em->getRepository('AppBundle:Project')->find($project_id);
            $entity->setProject($project);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('config_task_group_show', ['task_group_id' => $entity->getId(), 'project_id' => $project_id]));
        }

        return $this->render('TaskGroup/new.html.twig',[
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * Creates a form to create a TaskGroup entity.
     *
     * @param TaskGroup $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TaskGroup $entity, $project_id)
    {
        $form = $this->createForm(new TaskGroupType(), $entity, array(
            'action' => $this->generateUrl('config_task_group_create', ['project_id' => $project_id]),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Displays a form to create a new TaskGroup entity.
     *
     * @Route("/{project_id}/task-group/new", name="config_task_group_new")
     * @Method("GET")
     *
     */
    public function newAction($project_id)
    {
        $entity = new TaskGroup();
        $em = $this->getDoctrine()->getManager();

        $project= $em->getRepository('AppBundle:Project')->find($project_id);
        $entity->setProject($project);

        $form   = $this->createCreateForm($entity, $project_id);

        return $this->render('TaskGroup/new.html.twig', [
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a TaskGroup entity.
     *
     * @Route("/{project_id}/task-group/{task_group_id}", name="config_task_group_show")
     * @Method("GET")
     *
     */
    public function showAction($project_id, $task_group_id)
    {
        $entity = $this->getDoctrine()->getRepository('AppBundle:TaskGroup')
                        ->findBy(['project' => $project_id,
                            'id' => $task_group_id
                            ]);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($project_id);

        return $this->render('TaskGroup/show.html.twig',[
            'entity' => $entity,
            'delete_form' => $deleteForm->createView()]);
    }

    /**
     * Displays a form to edit an existing TaskGroup entity.
     *
     * @Route("/{project_id}/task-group/edit", name="config_task_group_edit")
     * @Method("GET")
     *
     */
    public function editAction($project_id)
    {
        $em = $this->getDoctrine()->getManager();

        $project= $em->getRepository('AppBundle:Project')->find($project_id);
        $entity->setProject($project);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskGroup entity.');
        }

        $editForm = $this->createEditForm($entity, $project_id);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TaskGroup/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
    * Creates a form to edit a TaskGroup entity.
    *
    * @param TaskGroup $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TaskGroup $entity, $project_id)
    {
        $form = $this->createForm(new TaskGroupType(), $entity, array(
            'action' => $this->generateUrl('config_task_group_update', ['project_id' => $project_id]),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TaskGroup entity.
     *
     * @Route("/{id}", name="config_task_group_update")
     * @Method("PUT")
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('config_task_group_edit', array('id' => $id)));
        }

        return $this->render('TaskGroup/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }
    /**
     * Deletes a TaskGroup entity.
     *
     * @Route("/{id}", name="config_task_group_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:TaskGroup')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TaskGroup entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('config_task_group'));
    }

    /**
     * Creates a form to delete a TaskGroup entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('config_task_group_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
