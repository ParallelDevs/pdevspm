<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', ['label' => 'Name'])
            ->add('description', 'textarea', ['label' => 'Description'])
            ->add('orderTasksBy', 'text', ['label' => 'OrderTasksBy'])
            ->add('projectsStatus', 'entity', ['class' => 'AppBundle\Entity\ProjectsStatus', 'property' => 'name'])
            ->add('projectsTypes', 'entity', ['class' => 'AppBundle\Entity\ProjectsTypes' , 'property' => 'name'])
            ->add('createdBy', 'entity', ['class' => 'AppBundle\Entity\Users' , 'property' => 'name'])
            ->add('save', 'submit', ['label' => 'Save'])
            ->add('close', 'submit', ['label' => 'Close'])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Projects'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'projects';
    }
}
