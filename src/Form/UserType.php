<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
	        ->add('lastName')
	        ->add('email')
	        ->add('username')
	        ->add('password', PasswordType::class)
	        ->add('roles')
        ;

        $builder->get('roles')
                ->addModelTransformer(new CallbackTransformer(
                	function($roles){
						if($roles)
                		    return implode(',', $roles);
	                },
		            function($roles){
			            return explode(',', $roles);
		            })
                );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
