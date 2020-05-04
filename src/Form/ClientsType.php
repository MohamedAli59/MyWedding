<?php

namespace App\Form;

use App\Entity\Clients;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Prenom')
            ->add('Telephone')
            ->add('Email')
            //  ->add('Password', PasswordType::class)
            ->add('Civilite', ChoiceType::class, [
                'choices' => [
                    'Mariée' => 'Mariée',
                    'Mari' => 'Mari',
                ],
            ])
            ->add('role', ChoiceType::class, [
                'choices' => [
                    'Utilisateur' => 'ROLE_USER',
                    'Admin' => 'ROLE_ADMIN',
                ],
            ])
            //      ->add('date_add')
            //      ->add('date_update')
            //      ->add('date_delete')
            //      ->add('activate')
            ->add('mariage', EntityType::class,[
                'class' => 'App:Mariages',
                'multiple' => false, // a user can select only one option per submission
                'expanded' => false // options will be presented in a <select> element; set this to true, to present the data as checkboxes
            ])
            ->add('adresse', AdressesType::class);   // ajouter le formulaire adresse directement au formulaire Client .
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Clients::class,
        ]);
    }
}
