<?php

namespace App\Form;

use App\Entity\Adresses;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdressesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Numero')
            ->add('Voie')
            ->add('Ville')
            ->add('Code_Postal')
            ->add('Pays')
            //  ->add('date_add')
            //  ->add('date_update')
            // ->add('date_delete')
            //  ->add('client')
            // ->add('activate')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adresses::class,
        ]);
    }
}
