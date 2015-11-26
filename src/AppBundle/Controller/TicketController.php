<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Ticket;
use AppBundle\Form\Type\TicketType;
use Symfony\Component\Form\FormInterface;

/**
 * Ticket controller.
 *
 * @Route("/app/project")
 */
class TicketController extends Controller
{

    /**
     * Lists all Ticket entities.
     *
     * @Route("/{project_id}/ticket", name="ticket")
     * @Method("GET")
     */
    public function indexAction($project_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Ticket')->findByProject($project_id);

        return $this->render('Ticket/index.html.twig', ['entity' => $entities]);
    }

    /**
     * Creates a new Ticket entity.
     *
     * @Route("/{project_id}/ticket-create", name="ticket_create")
     * @Method("POST")
     */
    public function createAction(Request $request, $project_id)
    {
        $entity = new Ticket();
        $form = $this->createCreateForm($entity, $project_id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // Assign Current user
            $user = $this->get('security.token_storage')->getToken()->getUser();
            $entity->setUser($user);
            $entity->setCreatedAt(new \DateTime('now'));

            $project = $em->getRepository('AppBundle:Project')->find($project_id);
            $entity->setProject($project);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ticket_show', ['ticket_id' => $entity->getId(), 'project_id' => $project_id]));
        }

        return $this->render('Ticket/new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Creates a form to create a Ticket entity.
     *
     * @param Ticket $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Ticket $entity, $project_id)
    {
        $form = $this->createForm(new TicketType(), $entity, array(
            'action' => $this->generateUrl('ticket_create', ['project_id' => $project_id]),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Ticket entity.
     *
     * @Route("/{project_id}/ticket/new", name="ticket_new")
     * @Method("GET")
     */
    public function newAction($project_id)
    {
        $entity = new Ticket();
        $em = $this->getDoctrine()->getManager();

        $project = $em->getRepository('AppBundle:Project')->find($project_id);
        $entity->setProject($project);

        $form = $this->createCreateForm($entity, $project_id);

        return $this->render('Ticket/new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a Ticket entity.
     *
     * @Route("/{project_id}/ticket/{ticket_id}", name="ticket_show")
     * @Method("GET")
     */
    public function showAction($project_id, $ticket_id)
    {
        $entity = $this->getDoctrine()->getRepository('AppBundle:Ticket')
            ->findBy(['project' => $project_id,
                'id' => $ticket_id
            ]);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ticket entity.');
        }

        $deleteForm = $this->createDeleteForm($project_id, $ticket_id);

        return $this->render('Ticket/show.html.twig', [
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
            'project_id' => $project_id,
            'ticket_id' => $ticket_id
        ]);
    }

    /**
     * Displays a form to edit an existing Ticket entity.
     *
     * @Route("/{project_id}/ticket/{ticket_id}/edit", name="ticket_edit")
     * @Method("GET")
     */
    public function editAction($project_id, $ticket_id)
    {
        $em = $this->getDoctrine()->getManager();

        $ticket = $em->getRepository('AppBundle:Ticket')->find($ticket_id);

        $project = $em->getRepository('AppBundle:Project')->find($project_id);

        $ticket->setProject($project);

        if (!$ticket) {
            throw $this->createNotFoundException('Unable to find Ticket entity.');
        }

        $editForm = $this->createEditForm($ticket, $project_id, $ticket_id);

        return $this->render('Ticket/edit.html.twig', [
            'entity'      => $ticket,
            'edit_form'   => $editForm->createView(),

        ]);
    }

    /**
     * Creates a form to edit a Ticket entity.
     *
     * @param Ticket $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Ticket $entity, $project_id, $ticket_id)
    {
        $form = $this->createForm(new TicketType(), $entity, array(
            'action' => $this->generateUrl('ticket_update', ['project_id' => $project_id, 'ticket_id' => $ticket_id]),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Ticket entity.
     *
     * @Route("/{project_id}/ticket/{ticket_id}/update", name="ticket_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $project_id, $ticket_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Ticket')->find($ticket_id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ticket entity.');
        }

        $editForm = $this->createEditForm($entity, $project_id, $ticket_id);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            // Assign Current user
            $user = $this->get('security.token_storage')->getToken()->getUser();
            $entity->setUser($user);
            $entity->setCreatedAt(new \DateTime('now'));
            $em->flush();

            return $this->redirect($this->generateUrl('ticket', array('project_id' => $project_id)));
        }

        return $this->render('Ticket/index.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'project_id' => $project_id,

        ]);
    }

    /**
     * Deletes a Ticket entity.
     *
     * @Route("/{project_id}/ticket/{ticket_id}/delete", name="ticket_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $ticket_id, $project_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $this->getDoctrine()->getRepository('AppBundle:Ticket')
            ->findBy(['project' => $project_id,
                'id' => $ticket_id
            ]);

        foreach ($entity as $ticket) {
            $em->remove($ticket);
        }
        $em->flush();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ticket entity.');
        }

        return $this->redirect($this->generateUrl('ticket', array('project_id' => $project_id)));
    }

    /**
     * Creates a form to delete a Project entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($project_id, $ticket_id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ticket_delete', ['project_id' => $project_id,'ticket_id' => $ticket_id]))
            ->setMethod('DELETE')
            ->add('submit', 'submit', ['label' => 'Delete'])
            ->getForm()
            ;
    }
}
