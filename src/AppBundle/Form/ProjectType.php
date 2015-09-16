<?php

namespace AppBundle\Form;

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
            ->add('name')
            ->add('description')
            //->add('createdAt')
            ->add('orderTaskBy')
            ->add('team', 'entity', [
                'class' => 'AppBundle\Entity\User', 
                'property' => 'username',
                'multiple' => true,
                'expanded' => true
                ])
            ->add('projectStatus', 'entity', ['class' => 'AppBundle\Entity\ProjectStatus', 'property' => 'name'])
            ->add('projectType', 'entity', ['class' => 'AppBundle\Entity\ProjectType', 'property' => 'name'])
            ->add('createdBy', 'hidden')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Project'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'project';
    }
}
