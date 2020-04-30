<?php

namespace App\Form;

use App\Entity\Mariages;
use App\Entity\Prestations;
use App\Entity\PrestationsMariages;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrestationsMariagesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mariage', EntityType::class, [
                'class' => Mariages::class,
                'choice_label' => 'id',
                'multiple' => false,
                'expanded' => true,])
            ->add('prestation', EntityType::class, [
                'class' => Prestations::class,
                'choice_label' => 'Nom',
                'multiple' => true,
                'expanded' => true,])
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
