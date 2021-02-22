<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Team;
use App\Entity\Convocation;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           
            ->add('lastname', TextType::class,[
                'label' => 'Nom'
            ])
            ->add('firstname', TextType::class,[
                'label' => 'Nom'
            ])
            ->add('team', EntityType::class, [
                'by_reference' => false,
                'expanded'=>true,
                'multiple' => true,
                'class' => Team::class,
                'choice_label' => 'name'
            ] )
            ->add('file', VichImageType::class, [
                'label' => 'Avatar',
                'required' => false,
                
            ])
            ->add('positionHeld', TextType::class,[
                'label' => 'Rôle',
                'required' => false
            ])
            
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
