<?php

namespace App\Form;

use App\Entity\Mariages;
use App\Entity\Prestations;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MariagesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Date')
            ->add('Lieu')
            ->add('NB_Invites')
            ->add('Budget')
            ->add('prestationsMariages', CollectionType::class, [
                'entry_type' => PrestationsMariagesType::class,
                'entry_options' => ['label' => true],
                'allow_add' => true,
                'by_reference' => false,
                'prototype' => true,
                ])
            //  ->add('date_add')
            //   ->add('date_update')
            //   ->add('date_delete')
            //  ->add('activate')
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Mariages::class,
        ]);
    }
}
