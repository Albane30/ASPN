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


class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class,[
                'label' => 'Nom'
            ])
            ->add('firstname')
            ->add('team', EntityType::class, [
                'by_reference' => false,
                'expanded'=>true,
                'multiple' => true,
                'class' => Team::class,
                'choice_label' => 'name'
            ] )
            ->add('file', VichImageType::class, [
                'label' => 'Avatar',
                'required'=> false,
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
