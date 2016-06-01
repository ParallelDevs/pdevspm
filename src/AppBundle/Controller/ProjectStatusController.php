<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\ProjectStatus;

/**
 * ProjectStatus controller.
 *
 * @Route("/projectstatus")
 */
class ProjectStatusController extends Controller
{
    /**
     * Lists all ProjectStatus entities.
     *
     * @Route("/", name="projectstatus_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $this->denyAccessUnlessGranted('manage', new ProjectStatus());

        $em = $this->getDoctrine()->getManager();

        $projectStatuses = $em->getRepository('AppBundle:ProjectStatus')->findAllProjectStatus();

        return $this->render('projectstatus/index.html.twig', array(
            'projectStatuses' => $projectStatuses,
        ));
    }

    /**
     * Creates a new ProjectStatus entity.
     *
     * @Route("/new", name="projectstatus_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $projectStatus = new ProjectStatus();

        $this->denyAccessUnlessGranted('manage', $projectStatus);

        $form = $this->createForm('AppBundle\Form\ProjectStatusType', $projectStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projectStatus);
            $em->flush();

            return $this->redirectToRoute('projectstatus_show', array('id' => $projectStatus->getId()));
        }

        return $this->render('projectstatus/new.html.twig', array(
            'projectStatus' => $projectStatus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProjectStatus entity.
     *
     * @Route("/{id}", name="projectstatus_show")
     * @Method("GET")
     */
    public function showAction(ProjectStatus $projectStatus)
    {
        $this->denyAccessUnlessGranted('manage', $projectStatus);

        $deleteForm = $this->createDeleteForm($projectStatus);

        return $this->render('projectstatus/show.html.twig', array(
            'projectStatus' => $projectStatus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ProjectStatus entity.
     *
     * @Route("/{id}/edit", name="projectstatus_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProjectStatus $projectStatus)
    {
        $this->denyAccessUnlessGranted('manage', $projectStatus);

        $deleteForm = $this->createDeleteForm($projectStatus);
        $editForm = $this->createForm('AppBundle\Form\ProjectStatusType', $projectStatus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projectStatus);
            $em->flush();

            return $this->redirectToRoute('projectstatus_edit', array('id' => $projectStatus->getId()));
        }

        return $this->render('projectstatus/edit.html.twig', array(
            'projectStatus' => $projectStatus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProjectStatus entity.
     *
     * @Route("/{id}", name="projectstatus_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProjectStatus $projectStatus)
    {
        $this->denyAccessUnlessGranted('manage', $projectStatus);

        $form = $this->createDeleteForm($projectStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projectStatus);
            $em->flush();
        }

        return $this->redirectToRoute('projectstatus_index');
    }

    /**
     * Creates a form to delete a ProjectStatus entity.
     *
     * @param ProjectStatus $projectStatus The ProjectStatus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProjectStatus $projectStatus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projectstatus_delete', array('id' => $projectStatus->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
