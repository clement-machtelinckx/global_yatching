<?php

namespace App\Form;

use App\Entity\Boat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BoatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('loa')
            ->add('beam')
            ->add('draft')
            ->add('year')
            ->add('builder')
            ->add('material')
            ->add('accomodation')
            ->add('engines')
            ->add('boatRange')
            ->add('cruise_speed')
            ->add('max_speed')
            ->add('price')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Boat::class,
        ]);
    }
}
