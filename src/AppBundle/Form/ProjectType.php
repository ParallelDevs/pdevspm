<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email', EmailType::class)
            ->add('description')
            ->add('createdAt', DateType::class)
            ->add('orderTaskBy')
            ->add('team', EntityType::class, [
                'class' => 'AppBundle:User',
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('projectStatus', EntityType::class, [
                'class' => 'AppBundle:ProjectStatus',
                'choice_label' => 'name',
            ])
            ->add('projectType', EntityType::class, [
                'class' => 'AppBundle:ProjectType',
                'choice_label' => 'name',
            ])
            ->add('createdBy', EntityType::class, [
                'class' => 'AppBundle:User',
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Project',
        ));
    }
}
