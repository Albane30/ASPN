<?php

namespace App\Form;

use App\Entity\Convocation;
use App\Entity\Team;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;


class ConvocationType extends AbstractType
{   private $userRepository;

   
   public function __construct(UserRepository $userRepository)
   {
       $this->userRepository = $userRepository;
   }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateTimeType::class,[
                'label' => 'Date et heure',
                'required' => true,
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Amical' => 'Amical',
                    'Championnat' => 'Championnat',
                    'Coupe' => 'Coupe',
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
            ->add('team', EntityType::class, [
                'class' => Team::class,
                'choice_label' => 'name'
            ])
            ;
            
            $formModifier = function (FormInterface $form, Team $team = null) {
                $users = null === $team ? [] : $team->getUser();
    
                $form->add('user', EntityType::class, [
                    'class' => User::class,
                    'placeholder' => '',
                    'choices' => $users,
                    'multiple' => true,
                    'by_reference' => false,
                    'expanded' => true,
                    'choice_label' => function (User $user) {
                        return $user->getFirstname() . ' ' . $user->getLastname();
                
                    }
                ]);
            };
    
            $builder->addEventListener(
                FormEvents::PRE_SET_DATA,
                function (FormEvent $event) use ($formModifier) {
                    $data = $event->getData();
    
                    $formModifier($event->getForm(), $data->getTeam());
                }
            );
    
            $builder->get('team')->addEventListener(
                FormEvents::POST_SUBMIT,
                function (FormEvent $event) use ($formModifier) {
                    $team = $event->getForm()->getData();
                    $formModifier($event->getForm()->getParent(), $team);
                }
            );
        
    }

    


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Convocation::class,
            'attr' => ['id' => 'convocation_form']
        ));
    }
 
}
