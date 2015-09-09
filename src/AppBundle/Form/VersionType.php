<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VersionType extends AbstractType
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
            ->add('dueDate')
            ->add('project', 'hidden', ['property_path' => 'project.id'])
            ->add('versionStatus', 'entity', ['class' => 'AppBundle\Entity\VersionStatus', 'property' => 'name'])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Version'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_version';
    }
}
