<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Ticket;
use AppBundle\Form\TicketType;

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

        return $this->render('Ticket/index.html.twig', ['entities' => $entities]);
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

            $project= $em->getRepository('AppBundle:Project')->find($project_id);
            $entity->setProject($project);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ticket_show', ['ticket_id' => $entity->getId(), 'project_id' => $project_id]));
        }

        return $this->render('Ticket/new.html.twig',[
            'entity' => $entity,
            'form'   => $form->createView(),
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

        $project= $em->getRepository('AppBundle:Project')->find($project_id);
        $entity->setProject($project);

        $form   = $this->createCreateForm($entity, $project_id);

        return $this->render('Ticket/new.html.twig', [
            'entity' => $entity,
            'form'   => $form->createView(),
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

        $deleteForm = $this->createDeleteForm($project_id);

        return $this->render('Ticket/show.html.twig',[
            'entity' => $entity,
            'delete_form' => $deleteForm->createView()]);
    }

    /**
     * Displays a form to edit an existing Ticket entity.
     *
     * @Route("/{id}/ticket/edit", name="ticket_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $entity = new Ticket();
        $em = $this->getDoctrine()->getManager();

        $entity= $em->getRepository('AppBundle:Ticket')->find($id);


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ticket entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Ticket/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
    * Creates a form to edit a Ticket entity.
    *
    * @param Ticket $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Ticket $entity, $project_id)
    {
        $form = $this->createForm(new TicketType(), $entity, array(
            'action' => $this->generateUrl('ticket_update', ['project_id' => $project_id]),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Ticket entity.
     *
     * @Route("/{id}", name="ticket_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Ticket')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ticket entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ticket_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Ticket entity.
     *
     * @Route("/{id}", name="ticket_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Ticket')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ticket entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ticket'));
    }

    /**
     * Creates a form to delete a Ticket entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ticket_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
