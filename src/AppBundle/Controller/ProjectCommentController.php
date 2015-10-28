<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\ProjectComment;
use AppBundle\Form\ProjectCommentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * ProjectComment controller.
 *
 * @Route("/app/project")
 */
class ProjectCommentController extends Controller
{
    /**
     * Lists all ProjectComment entities.
     *
     * @Route("/{project_id}/project-comment", name="project_comment")
     * @Method("GET")
     */
    public function indexAction($project_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:ProjectComment')->findByProject($project_id);

        return $this->render('ProjectComment/index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new ProjectComment entity.
     *
     * @Route("/{project_id}/project-comment/create", name="project_comment_create")
     * @Method("POST")
     */
    public function createAction(Request $request, $project_id)
    {
        $projectComment = new ProjectComment();
        $form = $this->createCreateForm($projectComment, $project_id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = $this->get('security.token_storage')->getToken()->getUser();
            $projectComment->setCreatedBy($user);
            $projectComment->setCreatedAt(new \DateTime('now'));
            $project = $em->getRepository('AppBundle:Project')->find($project_id);
            $projectComment->setProject($project);

            $em->persist($projectComment);
            $em->flush();

            return $this->redirect($this->generateUrl('project_comment_show', ['project_comment_id' => $projectComment->getId(), 'project_id' => $project_id]));
        }

        return $this->render('ProjectComment/new.html.twig',[
            'entity' => $projectComment,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * Creates a form to create a ProjectComment entity.
     *
     * @param ProjectComment $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ProjectComment $entity, $project_id)
    {
        $form = $this->createForm(new ProjectCommentType(), $entity, array(
            'action' => $this->generateUrl('project_comment_create', ['project_id' => $project_id]),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ProjectComment entity.
     *
     * @Route("/{project_id}/project-comment/new", name="project_comment_new")
     * @Method("GET")
     */
    public function newAction($project_id)
    {
        $entity = new ProjectComment();
        $em = $this->getDoctrine()->getManager();

        $project = $em->getRepository('AppBundle:Project')->find($project_id);
        $entity->setProject($project);

        $form   = $this->createCreateForm($entity, $project_id);

        return $this->render('ProjectComment/new.html.twig', [
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a ProjectComment entity.
     *
     * @Route("/{project_id}/project-comment/{project_comment_id}", name="project_comment_show")
     * @Method("GET")
     */
    public function showAction($project_comment_id, $project_id)
    {
        $projectComment = $this->getDoctrine()->getRepository('AppBundle:ProjectComment')
            ->findBy(['project' => $project_id,
                'id' => $project_comment_id
            ]);

        if (!$projectComment) {
            throw $this->createNotFoundException('Unable to find ProjectComment entity.');
        }

        $deleteForm = $this->createDeleteForm($project_comment_id);

        return $this->render('ProjectComment/show.html.twig',
            [
                'entity' => $projectComment,
                'delete_form' => $deleteForm->createView()
            ]);
    }

    /**
     * Displays a form to edit an existing ProjectComment entity.
     *
     * @Route("/{project_id}/project-comment/{project_comment_id}/edit", name="project_comment_edit")
     * @Method("GET")
     */
    public function editAction($project_id, $project_comment_id)
    {
        $em = $this->getDoctrine()->getManager();

        $projectComment = $em->getRepository('AppBundle:ProjectComment')->find($project_comment_id);

        if (!$projectComment) {
            throw $this->createNotFoundException('Unable to find ProjectComment entity.');
        }

        $editForm = $this->createEditForm($projectComment, $project_id, $project_comment_id);


        return $this->render('ProjectComment/edit.html.twig', [
            'entity'      => $projectComment,
            'edit_form'   => $editForm->createView(),

        ]);
    }

    /**
    * Creates a form to edit a ProjectComment entity.
    *
    * @param ProjectComment $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ProjectComment $projectComment, $project_id, $project_comment_id)
    {
        $form = $this->createForm(new ProjectCommentType(), $projectComment, array(
            'action' => $this->generateUrl('project_comment_update', ['project_comment_id' => $project_comment_id, 'project_id' => $project_id]),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ProjectComment entity.
     *
     * @Route("/{project_id}/project-comment/{project_comment_id}/update", name="project_comment_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $project_id, $project_comment_id)
    {
        $em = $this->getDoctrine()->getManager();

        $project_comment = $em->getRepository('AppBundle:ProjectComment')->find($project_comment_id);

        if (!$project_comment) {
            throw $this->createNotFoundException('Unable to find ProjectComment entity.');
        }

        $editForm = $this->createEditForm($project_comment, $project_id, $project_comment_id);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('project_comment_edit', ['project_id' => $project_id, 'project_comment_id' => $project_comment_id ]));
        }

        return $this->render('ProjectComment/edit.html.twig', [
            'entity'      => $project_comment,
            'edit_form'   => $editForm->createView(),

        ]);
    }
    /**
     * Deletes a ProjectComment entity.
     *
     * @Route("/{project_id/project-comment/{project_comment_id}/delete", name="project_comment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $project_id, $project_comment_id)
    {
        $form = $this->createDeleteForm($project_comment_id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $projectComment = $em->getRepository('AppBundle:ProjectComment')->find($project_comment_id);

            if (!$projectComment) {
                throw $this->createNotFoundException('Unable to find ProjectComment entity.');
            }

            $em->remove($projectComment);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('project_comment', ['project_id' => $project_id]));
    }

    /**
     * Creates a form to delete a ProjectComment entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($project_comment_id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('project_comment_delete', array('id' => $project_comment_id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
