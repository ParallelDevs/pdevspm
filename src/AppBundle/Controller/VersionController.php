<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Version;
use AppBundle\Form\VersionType;
use AppBundle\Entity\Project;
/**
 * Version controller.
 *
 * @Route("/version")
 */
class VersionController extends Controller
{

    /**
     * Lists all Version entities.
     *
     * @Route("/", name="version")
     * @Method("GET")
     * 
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Version')->findAll();

        return $this->render('Version/index.html.twig', ['entities' => $entities]);
        
    }
    /**
     * Creates a new Version entity.
     *
     * @Route("/", name="version_create")
     * @Method("POST")
     * 
     */
    public function createAction(Request $request)
    {
        $entity = new Version();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            return $this->redirect($this->generateUrl('version_show', ['id' => $entity->getId()]));
        }
        
        return $this->render('Version/new.html.twig',[
            'entity' => $entity,
            'form'   => $form->createView(),
        ]);
    }

    /**
     * Creates a form to create a Version entity.
     *
     * @param Version $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Version $entity)
    {
        $form = $this->createForm(new VersionType(), $entity, array(
            'action' => $this->generateUrl('version_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Version entity.
     *
     * @Route("/new", name="version_new")
     * @Method("GET")
     * 
     */
    public function newAction()
    {
        $entity = new Version();
        $form   = $this->createCreateForm($entity);

        return $this->render('Version/new.html.twig', [
            'entity' => $entity,
            'form'   => $form->createView(),
        ]); 
    }

    /**
     * Finds and displays a Version entity.
     *
     * @Route("/{id}/project", name="version_show")
     * @Method("GET")
     * 
     */
    public function showAction($id)
    {
        $repository = $this->getDoctrine()
                    ->getRepository('AppBundle:Version'); 
        
        $entity = $repository->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Version entity.');
        }
        
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Version/show.html.twig', 
                 ['entity' => $entity, 
                  'id'=>$entity->getId(), 
                  'delete_form' => $deleteForm->createView()]);
    }

    /**
     * Displays a form to edit an existing Version entity.
     *
     * @Route("/{id}/edit", name="version_edit")
     * @Method("GET")
     * 
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Version')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Version entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Version/edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
    * Creates a form to edit a Version entity.
    *
    * @param Version $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Version $entity)
    {
        $form = $this->createForm(new VersionType(), $entity, array(
            'action' => $this->generateUrl('version_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Version entity.
     *
     * @Route("/{id}", name="version_update")
     * @Method("PUT")
     * 
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Version')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Version entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) { 
            $em->flush();

            return $this->redirect($this->generateUrl('version_edit', array('id' => $id)));
        }

        return $this->render('Version/edit.html.twig', [
          'entity'      => $entity,
          'edit_form'   => $editForm->createView(),
          'delete_form' => $deleteForm->createView(),
        ]);
    }
    /**
     * Deletes a Version entity.
     *
     * @Route("/{id}", name="version_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Version')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Version entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('version'));
    }

    /**
     * Creates a form to delete a Version entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('version_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
