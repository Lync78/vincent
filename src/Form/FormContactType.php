<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class FormContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo', TextType::class, [
                'required' => true,
                'mapped' => true,
                'attr'=> [
                  'class' => 'input',
                ],
                'constraints' => [
                  new NotBlank(),
                  New Length(['min'=>3])
                ],
            ])
            ->add('email', EmailType::class, [
                'required'=>true,
                'mapped'=> true,
                'attr'=> [
                    'class' => 'input',
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length(['min'=>5])
                ]
            ])
            ->add('raison', HiddenType::class, [
                'mapped' => true,
                'required' => true,
                'attr' => [
                    'class' => 'input',
                ],
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('message', TextareaType::class, [
                'mapped' => true,
                'required' => true,
                'attr'=> [
                    'class' => 'input',
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length(['min'=>5])
                ]
            ])
            ->add('miel', HiddenType::class, [
                "mapped" => true,
                "required" => false,
            ])
            ->add('envoyer', SubmitType::class, [
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
