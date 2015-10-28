<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjectCommentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('projectStatus', 'entity', ['class' => 'AppBundle\Entity\ProjectStatus', 'property' => 'name'])
            ->add('projectType', 'entity', ['class' => 'AppBundle\Entity\ProjectType', 'property' => 'name'])

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ProjectComment'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_projectcomment';
    }
}
