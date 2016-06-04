<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\ProjectType;

/**
 * ProjectType controller.
 *
 * @Route("/projecttype")
 */
class ProjectTypeController extends Controller
{
    /**
     * Lists all ProjectType entities.
     *
     * @Route("/", name="projecttype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $this->denyAccessUnlessGranted('manage', new ProjectType());

        $em = $this->getDoctrine()->getManager();

        $projectTypes = $em->getRepository('AppBundle:ProjectType')->findAll();

        return $this->render('projecttype/index.html.twig', array(
            'projectTypes' => $projectTypes,
        ));
    }

    /**
     * Creates a new ProjectType entity.
     *
     * @Route("/new", name="projecttype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $projectType = new ProjectType();

        $this->denyAccessUnlessGranted('manage', $projectType);

        $form = $this->createForm('AppBundle\Form\ProjectTypeType', $projectType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projectType);
            $em->flush();

            return $this->redirectToRoute('projecttype_show', array('id' => $projectType->getId()));
        }

        return $this->render('projecttype/new.html.twig', array(
            'projectType' => $projectType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProjectType entity.
     *
     * @Route("/{id}", name="projecttype_show")
     * @Method("GET")
     */
    public function showAction(ProjectType $projectType)
    {
        $this->denyAccessUnlessGranted('manage', $projectType);

        $deleteForm = $this->createDeleteForm($projectType);

        return $this->render('projecttype/show.html.twig', array(
            'projectType' => $projectType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ProjectType entity.
     *
     * @Route("/{id}/edit", name="projecttype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProjectType $projectType)
    {
        $this->denyAccessUnlessGranted('manage', $projectType);

        $deleteForm = $this->createDeleteForm($projectType);
        $editForm = $this->createForm('AppBundle\Form\ProjectTypeType', $projectType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projectType);
            $em->flush();

            return $this->redirectToRoute('projecttype_edit', array('id' => $projectType->getId()));
        }

        return $this->render('projecttype/edit.html.twig', array(
            'projectType' => $projectType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProjectType entity.
     *
     * @Route("/{id}", name="projecttype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProjectType $projectType)
    {
        $this->denyAccessUnlessGranted('manage', $projectType);

        $form = $this->createDeleteForm($projectType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projectType);
            $em->flush();
        }

        return $this->redirectToRoute('projecttype_index');
    }

    /**
     * Creates a form to delete a ProjectType entity.
     *
     * @param ProjectType $projectType The ProjectType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProjectType $projectType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projecttype_delete', array('id' => $projectType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
