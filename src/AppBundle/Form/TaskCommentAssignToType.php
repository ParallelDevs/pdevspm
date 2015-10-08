<?php
/**
 * Created by PhpStorm.
 * User: macmini1
 * Date: 10/8/15
 * Time: 5:28 PM
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaskCommentAssignToType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('assignedTo', 'entity', [
            'class' => 'AppBundle\Entity\User',
            'property' => 'username',
            'multiple' => true,
            'expanded' => true
        ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {

    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_task_comment_assign_to';
    }
}
