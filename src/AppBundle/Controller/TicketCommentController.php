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
    public function indexAction($project_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:TaskComment')->findByProject($project_id);

        return $this->render('TicketComment/index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new TicketComment entity.
     *
     * @Route("/", name="ticket_comment_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new TicketComment();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ticket_comment_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a TicketComment entity.
     *
     * @param TicketComment $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TicketComment $entity)
    {
        $form = $this->createForm(new TicketCommentType(), $entity, array(
            'action' => $this->generateUrl('ticket_comment_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TicketComment entity.
     *
     * @Route("/new", name="ticket_comment_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new TicketComment();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TicketComment entity.
     *
     * @Route("/{id}", name="ticket_comment_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TicketComment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TicketComment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TicketComment entity.
     *
     * @Route("/{id}/edit", name="ticket_comment_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TicketComment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TicketComment entity.');
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
    * Creates a form to edit a TicketComment entity.
    *
    * @param TicketComment $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TicketComment $entity)
    {
        $form = $this->createForm(new TicketCommentType(), $entity, array(
            'action' => $this->generateUrl('ticket_comment_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TicketComment entity.
     *
     * @Route("/{id}", name="ticket_comment_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TicketComment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TicketComment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ticket_comment_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TicketComment entity.
     *
     * @Route("/{id}", name="ticket_comment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:TicketComment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TicketComment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ticket_comment'));
    }

    /**
     * Creates a form to delete a TicketComment entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ticket_comment_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
