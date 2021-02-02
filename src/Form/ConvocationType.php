<?php

namespace App\Form;

use App\Entity\Convocation;
use App\Entity\Team;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ConvocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateTimeType::class,[
                'label' => 'Date et heure'
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Amical' => '0',
                    'Championnat' => '1',
                    'Coupe' => '2',
            ],
            ])
            ->add('place', TextType::class,[
                'label' => 'Lieu'
            ])
            ->add('opponent', TextType::class,[
                'label' => 'Adversaire'
            ])
            ->add('meeting', TextType::class,[
                'label' => 'Rendez-vous'
            ])
            ->add('content', TextType::class,[
                'label' => 'Infos'
            ])
            ->add('user', EntityType::class, [
                'by_reference' => false,
                'expanded'=>true,
                'multiple' => true,
                'class' => User::class,
                'choice_label' => function (User $user) {
                    return $user->getFirstname() . ' ' . $user->getLastname();
            
                }])
            ->add('team', EntityType::class, [
                'by_reference' => false,
                'class' => Team::class,
                'choice_label' => 'name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Convocation::class,
        ]);
    }
}
