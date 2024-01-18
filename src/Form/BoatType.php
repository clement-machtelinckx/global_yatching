<?php

namespace App\Form;

use App\Entity\Boat;
use DateTimeImmutable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class BoatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => 2,
                    'maxlength' => 255,
                ], 
                'label' => 'Name',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 2, 'max' => 25]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('loa', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'min' => 1,
                    'max' => 200,
                ], 
                'required' => false,
                'label' => 'Length overall',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\PositiveOrZero()
                ]
            ])
            ->add('beam', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'min' => 1,
                    'max' => 20,
                ], 
                'required' => false,
                'label' => 'Beam',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\PositiveOrZero()
                ]
            ])
            ->add('draft', NumberType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'min' => 0.1,
                    'max' => 10,
                ], 
                'required' => false,
                'label' => 'Draft',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\PositiveOrZero()
                ]
            ])
            ->add('year', DateType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'min' => 1900,
                    'max' => 2024,
                ], 
                'required' => false,
                'label' => 'Year',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                ]
            ])
            ->add('builder', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => 2,
                    'maxlength' => 255,
                ], 
                'required' => false,
                'label' => 'Builder',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 2, 'max' => 255]),
                ]
            ])
            ->add('material', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => 2,
                    'maxlength' => 255,
                ],
                'required' => false,
                'label' => 'Material',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 2, 'max' => 255]),
                ]
            ])
            ->add('accomodation', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'min' => 1,
                    'max' => 20,
                ], 
                'required' => false,
                'label' => 'Accomodation',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\PositiveOrZero()
                ]
            ])
            ->add('engines', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => 2,
                    'maxlength' => 255,
                ], 
                'required' => false,
                'label' => 'Engines',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 2, 'max' => 255]),
                ]
            ])
            ->add('boatRange', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'min' => 1,
                    'max' => 10000,
                ], 
                'required' => false,
                'label' => 'Boat range',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\PositiveOrZero()
                ]
            ])
            ->add('cruise_speed', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'min' => 1,
                    'max' => 50,
                ], 
                'required' => false,
                'label' => 'Cruise speed',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\PositiveOrZero()
                ]
            ])
            ->add('max_speed', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'min' => 1,
                    'max' => 50,
                ], 
                'required' => false,
                'label' => 'Max speed',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\PositiveOrZero()
                ]
            ])
            ->add('price', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'min' => 0,
                    'max' => 255,
                ], 
                'required' => false,
                'label' => 'Price',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Type(['type' => 'numeric']),
                    new Assert\PositiveOrZero()
                ]
            ])

            ->add('brand', ChoiceType::class, [
                'choices' => [
                    'default' => "default",
                    'OCEA' => "OCEA",
                    'Pirelli' => "Pirelli",
                    'Face' => "Face",
                    'occasion' => "occasion",
                ],
                'label' => 'brand',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class' => 'form-select'
                ]
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',

                ], 
                'required' => false,
                'label' => 'Description',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
            ])
            ->add('sumbit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary mt-4 mb-4'
                ]
            ])
            // ->add('boatImages', CollectionType::class, [
            //     'entry_type' => BoatImageType::class,
            //     'allow_add' => true,
            //     'by_reference' => false,
            // ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Boat::class,
        ]);
    }
}
