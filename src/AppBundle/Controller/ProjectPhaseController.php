<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\ProjectPhase;

/**
 * ProjectPhase controller.
 *
 * @Route("/projectphase")
 */
class ProjectPhaseController extends Controller
{
    /**
     * Lists all ProjectPhase entities.
     *
     * @Route("/", name="projectphase_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $projectPhases = $em->getRepository('AppBundle:ProjectPhase')->findAll();

        return $this->render('projectphase/index.html.twig', array(
            'projectPhases' => $projectPhases,
        ));
    }

    /**
     * Creates a new ProjectPhase entity.
     *
     * @Route("/new", name="projectphase_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $projectPhase = new ProjectPhase();
        $form = $this->createForm('AppBundle\Form\ProjectPhaseType', $projectPhase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projectPhase);
            $em->flush();

            return $this->redirectToRoute('projectphase_show', array('id' => $projectphase->getId()));
        }

        return $this->render('projectphase/new.html.twig', array(
            'projectPhase' => $projectPhase,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProjectPhase entity.
     *
     * @Route("/{id}", name="projectphase_show")
     * @Method("GET")
     */
    public function showAction(ProjectPhase $projectPhase)
    {
        $deleteForm = $this->createDeleteForm($projectPhase);

        return $this->render('projectphase/show.html.twig', array(
            'projectPhase' => $projectPhase,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ProjectPhase entity.
     *
     * @Route("/{id}/edit", name="projectphase_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProjectPhase $projectPhase)
    {
        $deleteForm = $this->createDeleteForm($projectPhase);
        $editForm = $this->createForm('AppBundle\Form\ProjectPhaseType', $projectPhase);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projectPhase);
            $em->flush();

            return $this->redirectToRoute('projectphase_edit', array('id' => $projectPhase->getId()));
        }

        return $this->render('projectphase/edit.html.twig', array(
            'projectPhase' => $projectPhase,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProjectPhase entity.
     *
     * @Route("/{id}", name="projectphase_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProjectPhase $projectPhase)
    {
        $form = $this->createDeleteForm($projectPhase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projectPhase);
            $em->flush();
        }

        return $this->redirectToRoute('projectphase_index');
    }

    /**
     * Creates a form to delete a ProjectPhase entity.
     *
     * @param ProjectPhase $projectPhase The ProjectPhase entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProjectPhase $projectPhase)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projectphase_delete', array('id' => $projectPhase->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
