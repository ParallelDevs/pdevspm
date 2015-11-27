<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\TicketType;
use AppBundle\Form\TicketTypeType;

/**
 * TicketType controller.
 *
 * @Route("/app/config/ticket/type")
 */
class TicketTypeController extends Controller
{
    /**
     * Lists all TicketType entities.
     *
     * @Route("/", name="config_ticket_type")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:TicketType')->findAll();

        return $this->render('TicketType/index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new TicketType entity.
     *
     * @Route("/", name="config_ticket_type_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new TicketType();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('config_ticket_type_show', array('id' => $entity->getId())));
        }

        return $this->render('TicketType/new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Creates a form to create a TicketType entity.
     *
     * @param TicketType $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TicketType $entity)
    {
        $form = $this->createForm(new TicketTypeType(), $entity, array(
            'action' => $this->generateUrl('config_ticket_type_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TicketType entity.
     *
     * @Route("/new", name="config_ticket_type_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new TicketType();
        $form = $this->createCreateForm($entity);

        return $this->render('TicketType/new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a TicketType entity.
     *
     * @Route("/{id}", name="config_ticket_type_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TicketType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TicketType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TicketType/show.html.twig', [
                'entity' => $entity,
                'id' => $entity->getId(),
                'delete_form' => $deleteForm->createView(),

        ]);
    }

    /**
     * Displays a form to edit an existing TicketType entity.
     *
     * @Route("/{id}/edit", name="config_ticket_type_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TicketType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TicketType entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('TicketType/edit.html.twig', [
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
        ]);
    }

    /**
     * Creates a form to edit a TicketType entity.
     *
     * @param TicketType $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(TicketType $entity)
    {
        $form = $this->createForm(new TicketTypeType(), $entity, array(
            'action' => $this->generateUrl('config_ticket_type_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TicketType entity.
     *
     * @Route("/{id}", name="config_ticket_type_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TicketType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TicketType entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('config_ticket_type_edit', array('id' => $id)));
        }

        return $this->render('TicketType/edit.html.twig', [
            'entity' => $entity,
            'edit_form' => $editForm->createView(),

        ]);
    }
    /**
     * Deletes a TicketType entity.
     *
     * @Route("/{id}/delete", name="config_ticket_type_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:TicketType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TicketType entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('config_ticket_type'));
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
            ->setAction($this->generateUrl('config_ticket_type_delete', ['id' => $id]))
            ->setMethod('DELETE')
            ->add('submit', 'submit', ['label' => 'Delete'])
            ->getForm()
            ;
    }
}
