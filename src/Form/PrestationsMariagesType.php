<?php

namespace App\Form;

use App\Entity\Mariages;
use App\Entity\Prestations;
use App\Entity\PrestationsMariages;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrestationsMariagesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           // ->add('budget')
            ->add('Quantite')
            ->add('Type')
           /* ->add('mariage', EntityType::class, [
                'class' => Mariages::class,
                'choice_label' => 'nom',
                'multiple' => false,
                'expanded' => true,])
           */

            ->add('prestation', EntityType::class, [
                'class' => Prestations::class,
                'choice_label' => 'nom',
           ])

           /*->add('prestation', CollectionType::class, [
                    'entry_type' => PrestationsType::class,

                ]*/


            //   ->add('date_add')
            //  ->add('date_update')
            //  ->add('date_delete')
            //  ->add('activate')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PrestationsMariages::class,
        ]);
    }
}
