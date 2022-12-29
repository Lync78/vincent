<?php

namespace App\Form;

use App\Entity\Service;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ServicesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description', TextType::class, [
                "constraints" => [
                    new NotBlank(["message" => "ce champs est obligatoire"]),
                    new Length(["max" => 50])
                ],
                "required" => true,
                "mapped" => true,
            ])
            ->add('sbtitle', TextType::class, [
                "constraints" => [
                    new NotBlank(["message" => "ce champs est obligatoire"]),
                    new Length(["max" => 30])
                ],
                "required" => true,
                "mapped" => true,
            ])
            ->add('actif', ChoiceType::class, [
                "expanded" => false,
                "multiple" => false,
                "required" => true,
                "mapped" => true,
                "constraints" => [
                    new NotBlank(["message" => "ce champs est obligatoire"])
                ],
                "choices" => [
                    "oui" => true,
                    "Non" => false,
                ]
            ])
            ->add('background', ChoiceType::class, [
                "mapped" => true,
                "required" => true,
                "constraints" => [new NotBlank(["message" => "ce champs est obligatoire"])],
                "choices" => [
                    "couleurCreations" => "couleurCreations",
                    "couleurGraphisme" => "couleurGraphisme",
                    "couleurGraphismeEntreprise" => "couleurGraphismeEntreprise",
                    "couleurAnimation" => "couleurAnimation",
                    "couleurOptionCommande" => "couleurOptionCommande",
                    "couleurPacks" => "couleurPacks",
                ],
                "expanded" => false,
                "multiple" => false,
            ])
            ->add('title', TextType::class, [
                "mapped" => true,
                "required" => true,
                "constraints" => [new NotBlank(["message" => "ce champs est obligatoire"])],
            ])
            ->add('category', ChoiceType::class, [
                "mapped" => false,
                "required" => true,
                "constraints" => [new NotBlank(["message" => "ce champs est obligatoire"])],
                "expanded" => false,
                "multiple" => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
        ]);
    }
}
