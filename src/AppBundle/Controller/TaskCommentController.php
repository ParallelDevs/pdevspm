<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\TaskComment;
use AppBundle\Form\TaskCommentType;

/**
 * TaskComment controller.
 *
 * @Route("/app/project")
 */
class TaskCommentController extends Controller
{

    /**
     * Lists all TaskComment entities.
     *
     * @Route("/{project_id}/task/{task_id}/task-comment", name="task_comment")
     * @Method("GET")
     */
    public function indexAction($task_id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskComment')->find($task_id);

        return $this->render('TaskComment/index.html.twig', ['entities' => $entity]);
    }
    /**
     * Creates a new TaskComment entity.
     *
     * @Route("/{project_id}/task/{task_id}/create-task-comment", name="task_comment_create")
     * @Method("POST")
     */
    public function createAction(Request $request, $project_id, $task_id)
    {
        $entity = new TaskComment();
        $form = $this->createCreateForm($entity, $project_id, $task_id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Assign Current user
            $user = $this->get('security.token_storage')->getToken()->getUser();
            $entity->setCreatedBy($user);
            $entity->setCreatedAt(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('task_comment_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a TaskComment entity.
     *
     * @param TaskComment $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TaskComment $entity, $project_id, $task_id)
    {
        $form = $this->createForm(new TaskCommentType(), $entity, array(
            'action' => $this->generateUrl('task_comment_create', ['project_id' => $project_id , 'task_id' => $task_id]),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TaskComment entity.
     *
     * @Route("/{project_id}/task/{task_id}/task-comment/new", name="task_comment_new")
     * @Method("GET")
     */
    public function newAction($project_id, $task_id)
    {
        $entity = new TaskComment();
        $form   = $this->createCreateForm($entity, $project_id, $task_id);

        return $this->render('TaskComment/new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),

        ]);
    }

    /**
     * Finds and displays a TaskComment entity.
     *
     * @Route("/{project_id}/task/{task_id}/", name="task_comment_show")
     * @Method("GET")
     */
    public function showAction($task_comment_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskComment')->find($task_comment_id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskComment entity.');
        }

        $deleteForm = $this->createDeleteForm($task_comment_id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TaskComment entity.
     *
     * @Route("/{id}/edit", name="task_comment_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskComment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskComment entity.');
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
    * Creates a form to edit a TaskComment entity.
    *
    * @param TaskComment $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TaskComment $entity)
    {
        $form = $this->createForm(new TaskCommentType(), $entity, array(
            'action' => $this->generateUrl('task_comment_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TaskComment entity.
     *
     * @Route("/{id}", name="taskcomment_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskComment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskComment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('task_comment_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TaskComment entity.
     *
     * @Route("/{id}", name="task_comment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:TaskComment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TaskComment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('task_comment'));
    }

    /**
     * Creates a form to delete a TaskComment entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('task_comment_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
