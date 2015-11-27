<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TicketType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('description', 'text')
            ->add('ticketStatus', 'entity', ['class' => 'AppBundle\Entity\TicketStatus', 'property' => 'name'])
            ->add('ticketType', 'entity', ['class' => 'AppBundle\Entity\TicketType', 'property' => 'name'])
            ->add('department', 'entity', ['class' => 'AppBundle\Entity\Department', 'property' => 'name'])
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Ticket',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_ticket';
    }
}
