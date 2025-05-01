<?php

namespace App\Form;

use App\Entity\Encadrant;
use App\Entity\Etudiant;
use App\Entity\Projet;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjetForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('etudiant', EntityType::class, [
                'class' => Etudiant::class,
                'choice_label' => 'id',
                'required' => false,
                'placeholder' => 'None',
            ])
            ->add('encadrant', EntityType::class, [
                'class' => Encadrant::class,
                'choice_label' => 'id',
                'required' => false,
                'placeholder' => 'None',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Projet::class,
        ]);
    }
}
