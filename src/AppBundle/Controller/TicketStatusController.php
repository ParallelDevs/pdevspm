<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\TicketStatus;
use AppBundle\Form\TicketStatusType;

/**
 * TicketStatus controller.
 *
 * @Route("/ticketstatus")
 */
class TicketStatusController extends Controller
{

    /**
     * Lists all TicketStatus entities.
     *
     * @Route("/", name="ticketstatus")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:TicketStatus')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TicketStatus entity.
     *
     * @Route("/", name="ticketstatus_create")
     * @Method("POST")
     * @Template("AppBundle:TicketStatus:new.html.twig")
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

            return $this->redirect($this->generateUrl('ticketstatus_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
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
            'action' => $this->generateUrl('ticketstatus_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TicketStatus entity.
     *
     * @Route("/new", name="ticketstatus_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TicketStatus();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TicketStatus entity.
     *
     * @Route("/{id}", name="ticketstatus_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TicketStatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TicketStatus entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TicketStatus entity.
     *
     * @Route("/{id}/edit", name="ticketstatus_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TicketStatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TicketStatus entity.');
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
    * Creates a form to edit a TicketStatus entity.
    *
    * @param TicketStatus $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TicketStatus $entity)
    {
        $form = $this->createForm(new TicketStatusType(), $entity, array(
            'action' => $this->generateUrl('ticketstatus_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TicketStatus entity.
     *
     * @Route("/{id}", name="ticketstatus_update")
     * @Method("PUT")
     * @Template("AppBundle:TicketStatus:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TicketStatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TicketStatus entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ticketstatus_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TicketStatus entity.
     *
     * @Route("/{id}", name="ticketstatus_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:TicketStatus')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TicketStatus entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ticketstatus'));
    }

    /**
     * Creates a form to delete a TicketStatus entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ticketstatus_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
