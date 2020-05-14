<?php

namespace App\Form;

use App\Entity\Prestations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrestationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
           // ->add('Prix')
           // ->add('Description')
            //   ->add('date_add')
            //  ->add('date_update')
            //  ->add('date_delete')
            //  ->add('activate')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Prestations::class,
        ]);
    }
}
