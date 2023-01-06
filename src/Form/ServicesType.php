<?php

namespace App\Form;

use App\Entity\Service;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
                "row_attr" => [
                    "class" => "form_group"
                ]
            ])
            ->add('sbtitle', TextType::class, [
                "constraints" => [
                    new NotBlank(["message" => "ce champs est obligatoire"]),
                    new Length(["max" => 30])
                ],
                "required" => true,
                "mapped" => true,
                "row_attr" => [
                    "class" => "form_group"
                ],
                "label" => "Sous titre"
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
                ],
                "row_attr" => [
                    "class" => "form_group"
                ],
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
                "row_attr" => [
                    "class" => "form_group"
                ]
            ])
            ->add('title', TextType::class, [
                "mapped" => true,
                "required" => true,
                "constraints" => [new NotBlank(["message" => "ce champs est obligatoire"])],
                "row_attr" => [
                    "class" => "form_group"
                ],
                "label" => "Titre"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
            'list' => null,
        ]);
    }
}
