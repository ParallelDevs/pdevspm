<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Task;
use AppBundle\Form\Type\TaskType;

/**
 * Task controller.
 *
 * @Route("/app/project")
 */
class TaskController extends Controller
{

    /**
     * Lists all Task entities.
     *
     * @Route("/{project_id}/task", name="task")
     * @Method("GET")
     */
    public function indexAction($project_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Task')->findByProject($project_id);

        return $this->render('Task/index.html.twig', ['entities' => $entities]);
    }

    /**
     * Creates a new Task entity.
     *
     * @Route("/{project_id}/task-create", name="task_create")
     * @Method("POST")
     */
    public function createAction(Request $request, $project_id)
    {
        $entity = new Task();
        $form = $this->createCreateForm($entity, $project_id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Assign Current user
            $user = $this->get('security.token_storage')->getToken()->getUser();
            $entity->setCreatedBy($user);
            $entity->setCreatedAt(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $project = $em->getRepository('AppBundle:Project')->find($project_id);
            $entity->setProject($project);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('task_show', ['task_id' => $entity->getId(), 'project_id' => $project_id]));
        }

        return $this->render('Task/new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Creates a form to create a Task entity.
     *
     * @param Task $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Task $entity, $project_id)
    {
        $form = $this->createForm(new TaskType(), $entity, array(
            'action' => $this->generateUrl('task_create', ['project_id' => $project_id]),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Task entity.
     *
     * @Route("/{project_id}/task/new", name="task_new")
     * @Method("GET")
     */
    public function newAction($project_id)
    {
        $entity = new Task();
        $form = $this->createCreateForm($entity, $project_id);

        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:User');
        $users = $repository->findAll();

        return $this->render('Task/new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
            'users' => $users
        ]);
    }

    /**
     * Finds and displays a Task entity.
     *
     * @Route("/{project_id}/task/{task_id}", name="task_show")
     * @Method("GET")
     */
    public function showAction($project_id, $task_id)
    {
        $entity = $this->getDoctrine()->getRepository('AppBundle:Task')
            ->findBy(['project' => $project_id,
                'id' => $task_id
            ]);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Task entity.');
        }

        $deleteForm = $this->createDeleteForm($project_id, $task_id);


        return $this->render('Task/show.html.twig', [
            'entity' => $entity,
            'id' => $task_id,
            'project' => $project_id,
            'delete_form' => $deleteForm->createView()
        ]);
    }

    /**
     * Displays a form to edit an existing Task entity.
     *
     * @Route("/task/{task_id}/edit", name="task_edit")
     * @Method("GET")
     */
    public function editAction($task_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Task')->find($task_id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Task entity.');
        }

        $editForm = $this->createEditForm($entity, $task_id);

        return $this->render('Task/edit.html.twig', [
            'entity' => $entity,
            'edit_form' => $editForm->createView(),

        ]);
    }

    /**
     * Creates a form to edit a Task entity.
     *
     * @param Task $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Task $entity, $task_id)
    {
        $form = $this->createForm(new TaskType(), $entity, array(
            'action' => $this->generateUrl('task_update', array('task_id' => $task_id)),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Task entity.
     *
     * @Route("/{task_id}/update", name="task_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $task_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Task')->find($task_id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Task entity.');
        }


        $editForm = $this->createEditForm($entity, $task_id);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('task_edit', array('task_id' => $task_id)));
        }

        return $this->render('Task/edit.html.twig', [
            'entity' => $entity,
            'edit_form' => $editForm->createView(),

        ]);
    }

    /**
     * Deletes a Task entity.
     *
     * @Route("/{project_id}/task/{task_id}/delete", name="task_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $project_id, $task_id)
    {
        $form = $this->createDeleteForm($project_id, $task_id);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        $entity = $this->getDoctrine()->getRepository('AppBundle:Task')
            ->findBy(['project' => $project_id,
                'id' => $task_id
            ]);

        foreach ($entity as $task) {
            $em->remove($task);
        }

        $em->flush();


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Task entity.');
        }

        return $this->redirect($this->generateUrl('task', array('project_id' => $project_id)));
    }

    /**
     * Creates a form to delete a  entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($project_id, $task_id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('task_delete', ['project_id' => $project_id , 'task_id' => $task_id]))
            ->setMethod('DELETE')
            ->add('submit', 'submit', ['label' => 'Delete'])
            ->getForm()
            ;
    }
}
