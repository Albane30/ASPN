<?php

namespace App\Form;

use App\Entity\Convocation;
use App\Entity\Team;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
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
            ->add('team', EntityType::class, [
                'by_reference' => false,
                'class' => Team::class,
                'choice_label' => 'name'
            ])
            ;
            
            $builder->addEventListener(
                FormEvents::PRE_SET_DATA,
                function (FormEvent $event) {
                    $form = $event->getForm();

                     // this would be your entity
                $data = $event->getData();

                $team = $data->getTeam();
                $users = null === $team ? [] : $team->getUser();
                    // var_dump($data);exit;
                $form->add('user', EntityType::class, [
                    'class' => User::class,
                    'placeholder' => 'Joueurs convoqués',
                    'choices' => $users,
                    'required' => true,
                    'by_reference' => false,
                    'expanded'=>false,
                    'multiple' => true,
                ]);
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
