<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Department;
use AppBundle\Form\DepartmentType;

/**
 * Department controller.
 *
 * @Route("/app/config/department")
 */
class DepartmentController extends Controller
{
    /**
     * Lists all Department entities.
     *
     * @Route("/", name="config_department")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Department')->findAll();

        return $this->render('Department/index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new Department entity.
     *
     * @Route("/", name="config_department_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new Department();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            //Assigned the current user in the Field Of User.
            $user = $this->get('security.token_storage')->getToken()->getUser();
            $entity->setUser($user);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('config_department_show', ['id' => $entity->getId()]));
        }

        return $this->render('Department/new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Creates a form to create a Department entity.
     *
     * @param Department $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Department $entity)
    {
        $form = $this->createForm(new DepartmentType(), $entity, array(
            'action' => $this->generateUrl('config_department_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Department entity.
     *
     * @Route("/new", name="config_department_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new Department();
        $form = $this->createCreateForm($entity);

        return $this->render('Department/new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a Department entity.
     *
     * @Route("/{id}", name="config_department_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Department')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Department entity.');
        }

        return $this->render('Department/show.html.twig', [
            'entity' => $entity,

        ]);
    }

    /**
     * Displays a form to edit an existing Department entity.
     *
     * @Route("/{id}/edit", name="config_department_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Department')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Department entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('Department/edit.html.twig', [
            'entity' => $entity,
            'edit_form' => $editForm->createView(),

        ]);
    }

    /**
     * Creates a form to edit a Department entity.
     *
     * @param Department $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Department $entity)
    {
        $form = $this->createForm(new DepartmentType(), $entity, array(
            'action' => $this->generateUrl('config_department_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Department entity.
     *
     * @Route("/{id}", name="config_department_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Department')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Department entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('config_department_edit', array('id' => $id)));
        }

        return $this->render('Department/edit.html.twig', [
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
        ]);
    }
    /**
     * Deletes a Department entity.
     *
     * @Route("/{id}/delete", name="config_department_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:Department')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Department entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('config_department'));
    }
}
