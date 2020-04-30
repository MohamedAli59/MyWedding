<?php

namespace App\Form;

use App\Entity\Mariages;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
