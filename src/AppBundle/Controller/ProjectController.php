<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Ticket;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Project;
use AppBundle\Form\Type\ProjectType;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;
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
     * @Route("/all", name="project")
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
     *
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
            $stringEmail = str_replace(" ", ",", $emailsTxt);

            var_dump($stringEmail);
            exit();

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('project_show', ['id' => $entity->getId()]));
        }

        return $this->render('Project/new.html.twig',[
            'entity' => $entity,
            'form'   => $form->createView(),
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
    *
    */
    public function newAction()
    {
        $entity = new Project();
        $form   = $this->createCreateForm($entity);

        $repository = $this->getDoctrine()
                ->getRepository('AppBundle:User');
        $users = $repository->findAll();

        return $this->render('Project/new.html.twig', [
            'entity' => $entity,
            'form'   => $form->createView(),
            'users'   => $users
        ]);
    }

    /**
    * Finds and displays a Project entity.
    *
    * @Route("/{project_id}", name="project_show")
    * @Method("GET")
    *
    */
    public function showAction($project_id)
    {
        $em = $this->getDoctrine()->getManager();

        $repository = $this->getDoctrine()
                    ->getRepository('AppBundle:Project');
        $entity = $repository->find($project_id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projects entity.');
        }

        $deleteForm = $this->createDeleteForm($project_id);

       return $this->render('Project/show.html.twig',
                 ['entity' => $entity,
                 'id'=>$entity->getId(),
                  'delete_form' => $deleteForm
                  ]);
    }

    /**
     * Displays a form to testing send email with SWIFTMAILER.
     *
     * @Route("/send-email", name="send_email")
     * @Method("POST")
     *
     */
    public function sendEmailAction(Request $request)
    {
        if($request->getMethod() == "POST"){

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
    *
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
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
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
    *
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
          'entity'      => $entity,
          'edit_form'   => $editForm->createView(),
          'delete_form' => $deleteForm->createView(),
        ]);
    }

    /*---------------------------------------RETRIEVE EMAIL FUNTIONALLITY----------------------------------*/
    /**
     * Displays a form to testing send email with TEST email.
     *
     * @Route("/retrieve-email", name="retrieve_email")
     * @Method("GET")
     *
     */

    public function retrieveEmailAction()
    {
        $imapFlags = "{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX";

        $emailUser = "i.delgado@paralleldevs.com";

        $passEmail = "IADMa1992";

        $em = $this->getDoctrine()->getManager();

        $mailbox = imap_open($imapFlags, $emailUser, $passEmail) or die(imap_last_error());

        $numMessages = imap_num_msg($mailbox);

        for ($i = 1; $i <= $numMessages; $i++) {

            $headers = imap_headerinfo($mailbox, $i);

            if($headers->Unseen === 'U'){

                $fromAddr = $headers->from[0]->mailbox . "@" . $headers->from[0]->host;

                $project_type = $em->getRepository('AppBundle:ProjectType')->findBy(['name' => 'Support']);

                $projects = $em->getRepository('AppBundle:Project')
                    ->findBy(['email' => $fromAddr,
                        'projectType' => $project_type
                    ]);

                $imap_uid = imap_uid($mailbox, $i);

                $ticket_DB = $em->getRepository('AppBundle:Ticket')->findByIdEmailTicket($imap_uid);

                if (sizeof($ticket_DB) == 0) {

                    $ticket = new Ticket();
                    $ticket->setName($headers->subject);
                    $body_msg = imap_fetchbody($mailbox, $i, 1);
                    $ticket->setDescription($body_msg);
                    $ticket->setCreatedAt(new \DateTime('now'));
                    $ticket->setIdEmailTicket($imap_uid);

                    foreach ($projects as $project) {
                        $ticket->setProject($project);
                    }

                    $em->persist($ticket);
                    $em->flush();
                }
            }
        }

        $all_tiquets = $em->getRepository('AppBundle:Ticket')->findAll();
        return $this->render('Project/formSendEmailTestDos.html.twig', ['entity' => $all_tiquets]);

    }

    /**
     * Delete all elements in the table
     *
     * @Route("/delete-all", name="delete_all_elements")
     * @Method("GET")
     *
     */

    public function deleteAction(){

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Ticket')->findAll();

        foreach ($entity as $ticket) {
            $em->remove($ticket);
        }

        $em->flush();

        if (!$entity) {
            throw $this->createNotFoundException('All elements was deleted  ');
        }

        return $this->render('Project/formSendEmailTestDos.html.twig', ['entity' => $entity]);

    }
        /*---------------------------------------RETRIEVE EMAIL FUNTIONALLITY----------------------------------*/
    /**
     * Displays a form to create a new Project entity.
     *
     * @Route("/form-email", name="new_form_email")
     * @Method("GET")
     *
     */
    public function newFormEmailAction()
    {
       // $entity = new Project();

        return $this->render('Project/formSendEmailTest.html.twig', [

            ]);
    }


    /**
     * Deletes a Project entity.
     *
     * @Route("/{project_id}/delete", name="project_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $project_id)
    {
        $form = $this->createDeleteForm($project_id);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Project')->findById($project_id);

        foreach ($entity as $task) {
            $em->remove($task);
        }

        $em->flush();


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Task entity.');
        }

        return $this->redirect($this->generateUrl('task', array('project_id' => $project_id)));
    }
    /**
     * Creates a form to delete a Project entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('project_delete', ['id' => $id]))
            ->setMethod('DELETE')
            ->add('submit', 'submit', ['label' => 'Delete'])
            ->getForm()
        ;
    }
}
