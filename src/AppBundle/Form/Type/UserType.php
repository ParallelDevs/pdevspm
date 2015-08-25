<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{    
    public function buildForm(FormBuilderInterface $builder, array $options) 
    {        
        $builder 
           ->add('active', 'checkbox', ['label' => 'Active ?'])     
           ->add('name', 'text', ['label' => 'Full Name'])
           ->add('photo', 'file', ['label' => 'Choose your photo'])
           ->add('email', 'email', ['label' => 'Email'])
           ->add('password', 'password', ['label' => 'Password'])
           ->add('usersGroup', 'entity', ['class' => 'AppBundle\Entity\UsersGroups', 'property' => 'name'])
           ->add('save', 'submit', ['label' => 'Save'])
           ;
    }
    
    public function getName()
    {
        return 'user';        
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
           'data_class' => 'AppBundle\Entity\Users',
       ]);
        
    }//End Function setDefaultOptions    
}//End Class