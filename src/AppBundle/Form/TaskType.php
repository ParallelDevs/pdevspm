<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaskType extends AbstractType
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
            ->add('assignedTo')
            //->add('estimatedTime')
            ->add('dueDate')
            ->add('createdAt')
            ->add('closedDate')
            //->add('discussionId')
            ->add('startDate')
            ->add('progress')
            //->add('project', 'entity',      ['class' => 'AppBundle\Entity\Project', 'property' => 'name'])
            //->add('ticket')
            ->add('taskStatus', 'entity',   ['class' => 'AppBundle\Entity\TaskStatus', 'property' => 'name'])
            ->add('taskPriority', 'entity', ['class' => 'AppBundle\Entity\TaskPriority', 'property' => 'name'])
            ->add('taskType', 'entity',     ['class' => 'AppBundle\Entity\TaskType', 'property' => 'name'])
            ->add('taskLabel', 'entity',    ['class' => 'AppBundle\Entity\TaskLabel', 'property' => 'name'])
            ->add('taskGroup', 'entity',    ['class' => 'AppBundle\Entity\TaskGroup', 'property' => 'name'])
            //->add('projectPhase')
            //->add('versions')
            //->add('createdBy')
            //NOTE: In this moment this entity CRUD is in the process. Ignore this comments. If they work.
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Task'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'task';
    }
}

