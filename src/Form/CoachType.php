<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Team;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CoachType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class,[
                'label' => 'Nom'
            ])
            ->add('firstname', TextType::class,[
                'label' => 'Prénom'
            ])
            ->add('team', EntityType::class, [
                'expanded'=>true,
                'multiple' => true,
                'class' => Team::class,
                'choice_label' => 'name'
            ] )
            ->add('file', VichImageType::class, [
                'label' => 'Avatar'
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