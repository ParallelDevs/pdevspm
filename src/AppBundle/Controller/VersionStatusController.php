<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\VersionStatus;
use AppBundle\Form\VersionStatusType;

/**
 * VersionStatus controller.
 *
 * @Route("/versionstatus")
 */
class VersionStatusController extends Controller
{

    /**
     * Lists all VersionStatus entities.
     *
     * @Route("/", name="versionstatus")
     * @Method("GET")
     * 
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:VersionStatus')->findAll();

        return $this->render('VersionStatus/index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new VersionStatus entity.
     *
     * @Route("/", name="versionstatus_create")
     * @Method("POST")
     * 
     */
    public function createAction(Request $request)
    {
        $entity = new VersionStatus();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('versionstatus_show', ['id' => $entity->getId()]));
        }

        return $this->render('VersionStatus/new.html.twig',[
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * Creates a form to create a VersionStatus entity.
     *
     * @param VersionStatus $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(VersionStatus $entity)
    {
        $form = $this->createForm(new VersionStatusType(), $entity, array(
            'action' => $this->generateUrl('versionstatus_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new VersionStatus entity.
     *
     * @Route("/new", name="versionstatus_new")
     * @Method("GET")
     * 
     */
    public function newAction()
    {
        $entity = new VersionStatus();
        $form   = $this->createCreateForm($entity);

        return $this->render('VersionStatus/new.html.twig', [
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);  
    }

    /**
     * Finds and displays a VersionStatus entity.
     *
     * @Route("/{id}", name="versionstatus_show")
     * @Method("GET")
     * 
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:VersionStatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find VersionStatus entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VersionStatus/show.html.twig', 
                 ['entity' => $entity, 
                  'id'=>$entity->getId(), 
                  'delete_form' => $deleteForm->createView()]);
    }

    /**
     * Displays a form to edit an existing VersionStatus entity.
     *
     * @Route("/{id}/edit", name="versionstatus_edit")
     * @Method("GET")
     * 
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:VersionStatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find VersionStatus entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VersionStatus/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
    * Creates a form to edit a VersionStatus entity.
    *
    * @param VersionStatus $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(VersionStatus $entity)
    {
        $form = $this->createForm(new VersionStatusType(), $entity, array(
            'action' => $this->generateUrl('versionstatus_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing VersionStatus entity.
     *
     * @Route("/{id}", name="versionstatus_update")
     * @Method("PUT")
     * 
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:VersionStatus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find VersionStatus entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('versionstatus_edit', ['id' => $id]));
        }

        return $this->render('VersionStatus/edit.html.twig', [
          'entity'      => $entity,
          'edit_form'   => $editForm->createView(),
          'delete_form' => $deleteForm->createView(),
        ]);
    }
    /**
     * Deletes a VersionStatus entity.
     *
     * @Route("/{id}", name="versionstatus_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:VersionStatus')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find VersionStatus entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('versionstatus'));
    }

    /**
     * Creates a form to delete a VersionStatus entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('versionstatus_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
