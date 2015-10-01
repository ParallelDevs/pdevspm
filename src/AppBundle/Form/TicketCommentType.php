<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TicketCommentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ticketStatus', 'entity', ['class' => 'AppBundle\Entity\TicketStatus', 'property' => 'name'])
            ->add('department', 'entity', ['class' => 'AppBundle\Entity\Department', 'property' => 'name'])
            ->add('ticketType', 'entity', ['class' => 'AppBundle\Entity\TicketType', 'property' => 'name'])
            ->add('ticketStatus', 'entity', ['class' => 'AppBundle\Entity\TicketStatus', 'property' => 'name'])
            ->add('description')
            ->add('user', 'entity', ['class' => 'AppBundle\Entity\User', 'property' => 'username', 'label' => 'Assigned to other Developer'])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\TicketComment'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ticket_comment';
    }
}
