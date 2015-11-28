<?php

namespace AppBundle\Mail;

use AppBundle\Entity\Ticket;
use PhpImap\Mailbox;

class Retrive
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Displays a form to testing send email with TEST email.
     *
     * @Route("/retrieve-email", name="retrieve_email")
     * @Method("POST")
     */
    public function retrieveEmailAction()
    {
        $mailbox = new Mailbox(
            '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX',
            'i.delgado@paralleldevs.com',
            'IADMa1992'
        );

        $mailsIds = $mailbox->searchMailBox('UNSEEN');
        foreach ($mailsIds as $mailId) {
            $mail = $mailbox->getMail($mailId);

            $ticket_DB = $this->em->getRepository('AppBundle:Ticket')->findByIdEmailTicket($mail->messageId);

            if (sizeof($ticket_DB) == 0) {

                $project_type = $this->em->getRepository('AppBundle:ProjectType')->findBy(['name' => 'Support']);

                $project = $this->em->getRepository('AppBundle:Project')
                    ->findBy(['email' => $mail->fromAddress,
                        'projectType' => $project_type,
                    ]);

                $ticketType = $this->em->getRepository('AppBundle:TicketType')->findBy(['name' => 'Created by email']);

                $ticketStatus = $this->em->getRepository('AppBundle:TicketStatus')->findBy(['name' => 'Open']);

                $ticket = new Ticket();
                $ticket->setName($mail->subject);
                $ticket->setDescription($mail->textPlain);
                $ticket->setCreatedAt(new \DateTime('now'));
                $ticket->setIdEmailTicket($mail->messageId);
                $ticket->setTicketType($ticketType);
                $ticket->setTicketStatus($ticketStatus);
                $ticket->setProject($project);

                $this->em->persist($ticket);
            }
        }

        $this->em->flush();
    }
}