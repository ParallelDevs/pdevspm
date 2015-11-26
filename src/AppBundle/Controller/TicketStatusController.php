<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\TicketStatus;
use AppBundle\Form\TicketStatusType;

/**
 * TicketStatus controller.
 *
 * @Route("/app/config/ticket/status")
 */
class TicketStatusController extends Controller
{

    /**
     * Lists all TicketStatus entities.
     *
     * @Route("/", name="config_ticket_status")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:TicketStatus')->findAll();

        return $this->render('TicketStatus/index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new TicketStatus entity.
     *
     * @Route("/", name="config_ticket_status_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new TicketStatus();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('config_ticket_status_show', array('id' => $entity->getId())));
        }

        return $this->render('TicketStatus/new.html.twig',[
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * Creates a form to create a TicketStatus entity.
     *
     * @param TicketStatus $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TicketStatus $entity)
    {
        $form = $this->createForm(new TicketStatusType(), $entity, array(
            'action' => $this->generateUrl('config_ticket_status_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TicketStatus entity.
     *
     * @Route("/new", name="config_ticket_status_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new TicketStatus();
        $form   = $this->createCreateForm($entity);

        return $this->render('TicketStatus/new.html.twig', [
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a TicketStatus entity.
     *
     * @Route("/{id}", name="config_ticket_status_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TicketStatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TicketStatus entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TicketStatus/show.html.twig', [
            'entity' => $entity,
            'id'=>$entity->getId(),
            'delete_form' => $deleteForm->createView()
        ]);
    }

    /**
     * Displays a form to edit an existing TicketStatus entity.
     *
     * @Route("/{id}/edit", name="config_ticket_status_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TicketStatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TicketStatus entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('TicketStatus/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),

        ]);
    }

    /**
    * Creates a form to edit a TicketStatus entity.
    *
    * @param TicketStatus $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TicketStatus $entity)
    {
        $form = $this->createForm(new TicketStatusType(), $entity, array(
            'action' => $this->generateUrl('config_ticket_status_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TicketStatus entity.
     *
     * @Route("/{id}", name="config_ticket_status_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TicketStatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TicketStatus entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('config_ticket_status_edit', ['id' => $id]));
        }

        return $this->render('TicketStatus/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ]);
    }
    /**
     * Deletes a TicketStatus entity.
     *
     * @Route("/{id}/delete", name="config_ticket_status_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:TicketStatus')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TicketStatus entity.');
            }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('config_ticket_status'));

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
            ->setAction($this->generateUrl('config_ticket_status_delete', ['id' => $id]))
            ->setMethod('DELETE')
            ->add('submit', 'submit', ['label' => 'Delete'])
            ->getForm()
            ;
    }
}
