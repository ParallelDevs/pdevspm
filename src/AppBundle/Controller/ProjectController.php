<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ticket;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Project;
use AppBundle\Form\Type\ProjectType;
use PhpImap\Mailbox;

/**
 * Project controller.
 *
 * @Route("/app/project")
 */
class ProjectController extends Controller
{
    /**
     * Lists all Project entities.
     *
     * @Route("/", name="project")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Project')->findAll();

        return $this->render('Project/index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new Project entity.
     *
     * @Route("/create", name="project_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new Project();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Assign Current user
            $user = $this->get('security.token_storage')->getToken()->getUser();
            $entity->setCreatedBy($user);
            $entity->setCreatedAt(new \DateTime('now'));

            $emailsTxt = $request->request->get('project')['email'];
            $stringEmail = str_replace(' ', ',', $emailsTxt);

            $entity->setEmail($stringEmail);

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('project_show', ['id' => $entity->getId()]));
        }

        return $this->render('Project/new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),

        ]);
    }

    /**
     * Creates a form to create a Project entity.
     *
     * @param Project $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Project $entity)
    {
        $form = $this->createForm(new ProjectType(), $entity, array(
            'action' => $this->generateUrl('project_create'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Displays a form to create a new Project entity.
     *
     * @Route("/new", name="project_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new Project();
        $form = $this->createCreateForm($entity);

        $repository = $this->getDoctrine()
                ->getRepository('AppBundle:User');
        $users = $repository->findAll();

        return $this->render('Project/new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
            'users' => $users,
        ]);
    }

    /**
     * Finds and displays a Project entity.
     *
     * @Route("/{project_id}", name="project_show")
     * @Method("GET")
     */
    public function showAction($project_id)
    {
        $repository = $this->getDoctrine()
                    ->getRepository('AppBundle:Project');
        $entity = $repository->find($project_id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projects entity.');
        }

        $deleteForm = $this->createDeleteForm($project_id);

        return $this->render('Project/show.html.twig',
                 ['entity' => $entity,
                  'project_id' => $project_id,
                  'delete_form' => $deleteForm,
                  ]);
    }

    /**
     * Displays a form to testing send email with SWIFTMAILER.
     *
     * @Route("/send-email", name="send_email")
     * @Method("POST")
     */
    public function sendEmailAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $to = $request->get('txt_to');
            $subject = $request->get('txt_subject');
            $body = $request->get('txt_body');

            $mailer = $this->container->get('mailer');

            $transport = \Swift_SmtpTransport::newInstance('i.delgado@paralleldevs.com', 25)
                ->setUsername('i.delgado@paralleldevs.com')
                ->setPassword('IADMa1992');

            $mailers = \Swift_Mailer::newInstance($transport);

            $message = \Swift_Message::newInstance('test')
                ->setSubject($subject)
                ->setFrom('isaiasdelgado007@gmail.com')
                ->setTo($to)
                ->setBody($body);

            $this->get('mailer')->send($message);
        }

        return $this->render('Project/formSendEmailTest.html.twig');
    }

    /**
     * Displays a form to edit an existing Project entity.
     *
     * @Route("/{id}/edit", name="project_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Project')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Project entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('Project/edit.html.twig', [
            'entity' => $entity,
            'edit_form' => $editForm->createView(), ]);
    }

    /**
     * Creates a form to edit a Project entity.
     *
     * @param Project $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Project $entity)
    {
        $form = $this->createForm(new ProjectType(), $entity, array(
            'action' => $this->generateUrl('project_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Project entity.
     *
     * @Route("/{id}", name="project_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Project')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Project entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('project_edit', ['id' => $id]));
        }

        return $this->render('Project/edit.html.twig', [
          'entity' => $entity,
          'edit_form' => $editForm->createView(), ]);
    }

    /**
     * Deletes a Project entity.
     *
     * @Route("/{project_id}/delete", name="project_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $project_id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:Project')->find($project_id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TicketType entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('project'));
    }
    /**
     * Creates a form to delete a Project entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($project_id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('project_delete', ['project_id' => $project_id]))
            ->setMethod('DELETE')
            ->add('submit', 'submit', ['label' => 'Delete'])
            ->getForm()
        ;
    }
}
