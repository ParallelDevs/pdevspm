<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ticket;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PhpImap\Mailbox;

/**
 * Mail controller.
 *
 * @Route("/app/mail")
 */
class EmailController extends Controller
{
    /**
     * Displays a form to testing send email with TEST email.
     *
     * @Route("/retrieve-email", name="retrieve_email")
     * @Method("GET")
     */
    public function retrieveEmailAction()
    {
        $mailbox = new Mailbox(
            '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX',
            'i.delgado@paralleldevs.com',
            'IADMa1992'
        );

        $mailsIds = $mailbox->searchMailBox('UNSEEN');
        $em = $this->getDoctrine()->getManager();
        foreach ($mailsIds as $mailId) {
            $mail = $mailbox->getMail($mailId);

            $ticket_DB = $em->getRepository('AppBundle:Ticket')->findByIdEmailTicket($mail->messageId);

            if (sizeof($ticket_DB) == 0) {

                $project_type = $em->getRepository('AppBundle:ProjectType')->findBy(['name' => 'Support']);

                $project = $em->getRepository('AppBundle:Project')
                    ->findBy(['email' => $mail->fromAddress,
                        'projectType' => $project_type,
                    ]);

                $ticketType = $em->getRepository('AppBundle:TicketType')->findBy(['name' => 'Created by email']);

                $ticketStatus = $em->getRepository('AppBundle:TicketStatus')->findBy(['name' => 'Open']);

                $ticket = new Ticket();
                $ticket->setName($mail->subject);
                $ticket->setDescription($mail->textPlain);
                $ticket->setCreatedAt(new \DateTime('now'));
                $ticket->setIdEmailTicket($mail->messageId);
                $ticket->setTicketType($ticketType);
                $ticket->setTicketStatus($ticketStatus);
                $ticket->setProject($project);

                $em->persist($ticket);
            }
        }

        $em->flush();
    }
}
