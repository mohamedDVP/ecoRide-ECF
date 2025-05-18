<?php

namespace App\Form;

use App\Entity\Covoiturage;
use App\Entity\User;
use App\Entity\Voiture;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CovoiturageForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateDepart')
            ->add('heureDepart')
            ->add('lieuDepart')
            ->add('dateArrivee')
            ->add('heureArrivee')
            ->add('lieuArrivee')
            ->add('statut')
            ->add('nbPlace')
            ->add('prixPersonne')
            ->add('users', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('voiture', EntityType::class, [
                'class' => Voiture::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Covoiturage::class,
        ]);
    }
}
