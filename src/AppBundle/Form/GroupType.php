<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class GroupType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Get formatted choices
        $choices = $this->getGroupPermissionsChoices();
        $builder
            ->add('manage_projects', ChoiceType::class, [
                'label' => 'Projects',
                'choices' => $choices,
            ])
            ->add('manage_tasks', ChoiceType::class, [
                'label' => 'Tasks',
                'choices' => $choices,
            ])
            ->add('manage_tickets', ChoiceType::class, [
                'label' => 'Tickets',
                'choices' => $choices,
            ])
            ->add('manage_discussions', ChoiceType::class, [
                'label' => 'Discussions',
                'choices' => $choices,
            ])
            ->add('manage_user', CheckboxType::class, [
                'label' => 'Users',
                'required' => false,
            ])
            ->add('manage_configuration', CheckboxType::class, [
                'label' => 'Configuration',
                'required' => false,
            ])
        ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\GroupFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_group';
    }

    /**
     * Get group permissions.
     *
     * 0 = None
     * 1 = Full access
     * 2 = View only
     * 3 = View own only
     * 4 = Manage own only
     *
     * User and configuration permission are boolean values
     *
     * @return array
     */
    private function getGroupPermissionsChoices()
    {
        return [
            'None' => 0,
            'Full access' => 1,
            'View only' => 2,
            'View own only' => 3,
            'Manage own only' => 4,
        ];
    }
}
