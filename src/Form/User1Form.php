<?php

namespace App\Form;

use App\Entity\Avis;
use App\Entity\Covoiturage;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class User1Form extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('nom')
            ->add('prenom')
            ->add('telephone')
            ->add('adresse')
            ->add('photo')
            ->add('pseudo')
            ->add('dateNaissance')
            ->add('isVerified')
            ->add('credits')
            ->add('covoiturage', EntityType::class, [
                'class' => Covoiturage::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('avis', EntityType::class, [
                'class' => Avis::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
