<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaskCommentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dueDate')
            ->add('workedHours', 'time', array(
                'input'  => 'datetime',
                'widget' => 'choice',
                'minutes' => array('10' => '10', '20' => '20', '30' => '30', '40' => '40', '50' => '50')))
            ->add('description')
            ->add('progress', 'choice', array(
                'choices' => array('5%' => '5%', '10%' => '10%', '15%' => '15%', '20%' => '20%', '25%' => '25%',
                    '30%' => '30%', '35%' => '35%', '40%' => '40%', '45%' => '45%', '50%' => '50%', '55%' => '55%',
                    '60%' => '60%', '65%' => '65%', '70%' => '70%', '75%' => '75%', '80%' => '80%', '85%' => '85%', '90%' => '90%',
                    '95%' => '95%', '100%' => '100%',
                )))
            ->add('taskStatus', 'entity', ['class' => 'AppBundle\Entity\TaskStatus', 'property' => 'name'])
            ->add('taskPriority', 'entity', ['class' => 'AppBundle\Entity\TaskPriority', 'property' => 'name'])
            ->add('taskLabel', 'entity', ['class' => 'AppBundle\Entity\TaskLabel', 'property' => 'name'])
            ->add('taskType', 'entity', ['class' => 'AppBundle\Entity\TaskType', 'property' => 'name'])
            ->add('createdBy', 'entity', ['class' => 'AppBundle\Entity\User', 'property' => 'username', 'label' => 'Created By'])
            ->add('task', 'entity', ['class' => 'AppBundle\Entity\Task', 'property' => 'name'])

        ;
    }
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\TaskComment'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_taskcomment';
    }
}
