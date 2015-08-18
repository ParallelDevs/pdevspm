<?php

namespace ParallelDevs\ProjectManagementBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class UserType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options) 
    {
        
        $builder
           ->add('name', 'text', ['label' => 'Name'])
           ->add('photo')
           ->add('email', 'email', ['label' => 'Email'])
           ->add('culture')
           ->add('password', 'password', ['label' => 'Password'])
           ->add('active')
           ->add('skin')
           //->add('usersGroup')
       ;
        
    }
    
    public function getName()
    {
        return 'user';        
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
           'data_class' => 'ParallelDevs\ProjectManagementBundle\Entity\Users',
       ]);
        
    }//End Function setDefaultOptions
    
    
    
    
    
    
}//End Class
