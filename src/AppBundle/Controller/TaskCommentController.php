<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\TaskComment;

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

        $entities = $em->getRepository('AppBundle:TaskComment')->findByTask($task_id);

        return $this->render('TaskComment/index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new TaskComment entity.
     *
     * @Route("/{project_id}/task/{task_id}/create-task-comment", name="task_comment_create")
     * @Method("POST")
     */
    public function createAction(Request $request, $project_id, $task_id)
    {
        $taskComment = new TaskComment();


        $em = $this->getDoctrine()->getManager();
        $form = $this->createCreateForm($taskComment, $project_id, $task_id);
        $form->handleRequest($request)->getData();

       if ($form->isValid()) {
            // Assign Current user
            $user = $this->get('security.token_storage')->getToken()->getUser();
            $taskComment->setCreatedBy($user);
            $taskComment->setCreatedAt(new \DateTime('now'));

            $project = $em->getRepository('AppBundle:Project')->find($project_id);
            $taskComment->setProject($project);

            $task = $em->getRepository('AppBundle:Task')->find($task_id);
            $taskComment->setTask($task);

            $arrayIdUsersTeam = $request->get('users');

            $newTeam = $em->getRepository('AppBundle:User')->findById($arrayIdUsersTeam);

            $newTeam = new ArrayCollection($newTeam);

            $taskComment->$task->setAssignedTo($newTeam);

            $em->persist($task);
            $em->persist($taskComment);
            $em->flush();

           return $this->redirect($this->generateUrl('task_comment_show', array('project_id' => $project_id, 'task_id' => $taskComment->getTask()->getId(), 'task_comment_id' => $taskComment->getId())));

        }

        return $this->render('TaskComment/new.html.twig', [
            'entity' => $taskComment,
            'form' => $form->createView(),

        ]);
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
            'action' => $this->generateUrl('task_comment_create', ['project_id' => $task_id , 'task_id' => $project_id]),
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
    public function newAction(Request $request, $project_id, $task_id)
    {
        $em = $this->getDoctrine()->getManager();

        $task = $em->getRepository('AppBundle:Task')->find($task_id);

        $taskComment = new TaskComment();
        $taskComment->setTask($task);

        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:User');
        $users = $repository->findAll();

        $team = $taskComment->$task->getAssignedTo();

        $form = $this->createCreateForm($taskComment, $task_id, $project_id);

        return $this->render('TaskComment/new.html.twig', [
            'entity' => $taskComment,
            'form' => $form->createView(),
            'task' => $task,
            'teamK' => $team,
            'users' => $users
        ]);
    }
    /**
     * Finds and displays a TaskComment entity.
     *
     * @Route("/{project_id}/task/{task_id}/task-comment/{task_comment_id}", name="task_comment_show")
     * @Method("GET")
     */
    public function showAction($project_id, $task_id, $task_comment_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskComment')->findBy(['task' => $task_id, 'id' => $task_comment_id]);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskComment entity.');
        }

        $deleteForm = $this->createDeleteForm($project_id, $task_id, $task_comment_id);

        return $this->render('TaskComment/show.html.twig',[
            'entity' => $entity,
            'id'=>$task_comment_id ,
            'project' =>$project_id,
            'task' => $task_id,
            'delete_form' => $deleteForm->createView()]);
    }

    /**
     * Displays a form to edit an existing TaskComment entity.
     *
     * @Route("/{project_id}/task/{task_id}/task-comment/{task_comment_id}/edit", name="task_comment_edit")
     * @Method("GET")
     */
    public function editAction($task_comment_id, $task_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TaskComment')->find($task_comment_id);

        $task = $em->getRepository('AppBundle:Task')->find($task_id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TaskComment entity.');
        }

        $team = $entity->task->getAssignedTo();

        $editForm = $this->createEditForm($entity);

        return $this->render('TaskComment/edit.html.twig', [
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'teamK' => $team

        ]);
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
            'action' => $this->generateUrl('task_comment_update', array('project_id' => $entity->getProject()->getId(),  'task_id' => $entity->getTask()->getId(), 'task_comment_id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TaskComment entity.
     *
     * @Route("/{project_id}/task/{task_id}/task-comment/{task_comment_id}/update", name="task_comment_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $task_comment_id, $task_id)
    {
        $em = $this->getDoctrine()->getManager();

        $taskComment = $em->getRepository('AppBundle:TaskComment')->find($task_comment_id);

        if (!$taskComment) {
            throw $this->createNotFoundException('Unable to find TaskComment entity.');
        }

        $task = $em->getRepository('AppBundle:Task')->find($task_id);
        $taskComment->setTask($task);

        $arrayIdUsersTeam = $request->get('users');
        $newTeam = $em->getRepository('AppBundle:User')->findById($arrayIdUsersTeam);
        $newTeam = new ArrayCollection($newTeam);
        $taskComment->task->setAssignedTo($newTeam);

        $em->persist($task);

        $editForm = $this->createEditForm($taskComment, $task_comment_id);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('task_comment_edit', array('project_id' => $taskComment->getProject()->getId() ,'task_id' => $taskComment->getTask()->getId(), 'task_comment_id' => $taskComment->getId())));
        }

        return $this->render('TaskComment/edit.html.twig', [
            'entity' => $taskComment,
            'edit_form' => $editForm->createView(),

        ]);
    }
    /**
     * Deletes a TaskComment entity.
     *
     * @Route("/{project_id}/task/{task_id}/task-comment/{task_comment_id}/delete", name="task_comment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $project_id, $task_id, $task_comment_id)
    {
            $form = $this->createDeleteForm($project_id, $task_id, $task_comment_id);
            $form->handleRequest($request);

            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('AppBundle:TaskComment')->findBy(['task' => $task_id, 'id' => $task_comment_id]);

            foreach ($entity as $task) {
                $em->remove($task);
            }

            $em->flush();

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TaskComment entity.');
            }

        return $this->redirect($this->generateUrl('task_comment', array('project_id' => $project_id, 'task_id' => $task_id)));
    }
    /**
     * Creates a form to delete a  entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($project_id, $task_id, $task_comment_id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('task_comment_delete', ['project_id' => $project_id , 'task_id' => $task_id, 'task_comment_id' => $task_comment_id]))
            ->setMethod('DELETE')
            ->add('submit', 'submit', ['label' => 'Delete'])
            ->getForm()
            ;
    }
}
