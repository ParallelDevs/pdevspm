<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\DiscussionStatus;
use AppBundle\Form\DiscussionStatusType;

/**
 * DiscussionStatus controller.
 *
 * @Route("/app/config/discussion/status")
 */
class DiscussionStatusController extends Controller
{

    /**
     * Lists all DiscussionStatus entities.
     *
     * @Route("/", name="config_discussion_status")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:DiscussionStatus')->findAll();

        return $this->render('DiscussionStatus/index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new DiscussionStatus entity.
     *
     * @Route("/discussion-status/create", name="config_discussion_status_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $discussionStatus = new DiscussionStatus();
        $form = $this->createCreateForm($discussionStatus);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($discussionStatus);
            $em->flush();

            return $this->redirect($this->generateUrl('discussion_status_show', array('id' => $discussionStatus->getId())));
        }

        return array(
            'entity' => $discussionStatus,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a DiscussionStatus entity.
     *
     * @param DiscussionStatus $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(DiscussionStatus $entity)
    {
        $form = $this->createForm(new DiscussionStatusType(), $entity, array(
            'action' => $this->generateUrl('discussion_status_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new DiscussionStatus entity.
     *
     * @Route("/new", name="discussion_status_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new DiscussionStatus();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a DiscussionStatus entity.
     *
     * @Route("/{id}", name="discussion_status_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:DiscussionStatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DiscussionStatus entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing DiscussionStatus entity.
     *
     * @Route("/{id}/edit", name="discussion_status_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:DiscussionStatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DiscussionStatus entity.');
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
    * Creates a form to edit a DiscussionStatus entity.
    *
    * @param DiscussionStatus $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DiscussionStatus $entity)
    {
        $form = $this->createForm(new DiscussionStatusType(), $entity, array(
            'action' => $this->generateUrl('discussion_status_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing DiscussionStatus entity.
     *
     * @Route("/{id}", name="discussion_status_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:DiscussionStatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DiscussionStatus entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('discussion_status_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a DiscussionStatus entity.
     *
     * @Route("/{id}", name="discussion_status_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:DiscussionStatus')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DiscussionStatus entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('discussion_status'));
    }

    /**
     * Creates a form to delete a DiscussionStatus entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('discussion_status_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
