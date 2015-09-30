<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\TicketComment;
use AppBundle\Form\TicketCommentType;

/**
 * TicketComment controller.
 *
 * @Route("/app/project")
 */
class TicketCommentController extends Controller
{
     /**
     * Lists all TicketComment entities.
     *
     * @Route("/{project_id}/ticket/{ticket_id}/ticket-comment", name="ticket_comment")
     * @Method("GET")
     */
    public function indexAction($ticket_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:TicketComment')->findByTicket($ticket_id);

        return $this->render('TicketComment/index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new TicketComment entity.
     *
     * @Route("/{project_id}/ticket/{ticket_id}/create", name="ticket_comment_create")
     * @Method("POST")
     */
    public function createAction(Request $request, $project_id, $ticket_id)
    {
        $entity = new TicketComment();
        $form = $this->createCreateForm($entity, $project_id, $ticket_id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $user = $this->get('security.token_storage')->getToken()->getUser();
            $entity->setUser($user);
            $entity->setCreatedAt(new \DateTime('now'));

            $project = $em->getRepository('AppBundle:Project')->find($project_id);
            $entity->setProject($project);

            $ticket = $em->getRepository('AppBundle:Ticket')->find($ticket_id);
            $entity->setTicket($ticket);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ticket_comment_show', array(
                                                                        'project_id' => $project_id,
                                                                        'ticket_id' => $ticket_id,
                                                                        'ticket_comment_id' => $entity->getId())));
        }

        return $this->render('TicketComment/new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Creates a form to create a TicketComment entity.
     *
     * @param TicketComment $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TicketComment $entity, $project_id, $ticket_id)
    {
        $form = $this->createForm(new TicketCommentType(), $entity, array(
            'action' => $this->generateUrl('ticket_comment_create', ['project_id' => $project_id, 'ticket_id' => $ticket_id]),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TicketComment entity.
     *
     * @Route("/{project_id}/ticket/{ticket_id}/ticket-comment/new", name="ticket_comment_new")
     * @Method("GET")
     */
    public function newAction($project_id, $ticket_id)
    {
        $entity = new TicketComment();
        $form   = $this->createCreateForm($entity, $project_id, $ticket_id);

        return $this->render('TicketComment/new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a TicketComment entity.
     *
     * @Route("/{project_id}/ticket/{ticket_id}/ticket-comment/{ticket_comment_id}", name="ticket_comment_show")
     * @Method("GET")
     */
    public function showAction($project_id, $ticket_id, $ticket_comment_id)
    {
        $entity = $this->getDoctrine()->getRepository('AppBundle:TicketComment')
            ->findBy(['ticket' => $ticket_id,
                'id' => $ticket_comment_id
            ]);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TicketComment entity.');
        }

        $deleteForm = $this->createDeleteForm($project_id, $ticket_id, $ticket_comment_id);

        return $this->render('TicketComment/show.html.twig', [
            'entity' => $entity,
            'project_id' => $project_id,
            'ticket_id' => $ticket_id,
            'ticket_comment_id' => $ticket_comment_id,
            'delete_form' => $deleteForm
        ]);
    }

    /**
     * Displays a form to edit an existing TicketComment entity.
     *
     * @Route("/{project_id}/ticket/{ticket_id}/ticket-comment/{ticket_comment_id}/edit", name="ticket_comment_edit")
     * @Method("GET")
     */
    public function editAction($ticket_comment_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TicketComment')->find($ticket_comment_id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TicketComment entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('TicketComment/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),

        ]);
    }

    /**
    * Creates a form to edit a TicketComment entity.
    *
    * @param TicketComment $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TicketComment $entity)
    {
        $form = $this->createForm(new TicketCommentType(), $entity, array(
            'action' => $this->generateUrl('ticket_comment_update', array('project_id' => $entity->getProject()->getId(), 'ticket_id' => $entity->getTicket()->getId(),'ticket_comment_id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TicketComment entity.
     *
     * @Route("/{project_id}/ticket/{ticket_id}/ticket-comment/{ticket_comment_id}/update", name="ticket_comment_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $ticket_comment_id, $ticket_id, $project_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TicketComment')->find($ticket_comment_id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TicketComment entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ticket_comment_edit', array('ticket_comment_id' => $ticket_comment_id, 'ticket_id' => $ticket_id, 'project_id' => $project_id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a TicketComment entity.
     *
     * @Route("/{project_id}/ticket/{ticket_id}/ticket-comment/{ticket_comment_id}/delete", name="ticket_comment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $project_id, $ticket_id, $ticket_comment_id)
    {
            $form = $this->createDeleteForm($project_id, $ticket_id, $ticket_comment_id);
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();

            $entity = $this->getDoctrine()->getRepository('AppBundle:TicketComment')
            ->findBy(['ticket' => $ticket_id,
                'id' => $ticket_comment_id
            ]);

            foreach ($entity as $task) {
                $em->remove($task);
            }

        $em->flush();

            if (!$entity) {
                    throw $this->createNotFoundException('Unable to find TicketComment entity.');
                }

        return $this->redirect($this->generateUrl('ticket_comment', array('project_id' => $project_id, 'ticket_id' => $ticket_id)));
    }

    /**
     * Creates a form to delete a TicketComment entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($project_id, $ticket_id, $ticket_comment_id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ticket_comment_delete', array('project_id' => $project_id , 'ticket_id' => $ticket_id, 'ticket_comment_id' => $ticket_comment_id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
