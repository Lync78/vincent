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
                    new Length(["max" => 255])
                ],
                "required" => false,
                "mapped" => true,
                "row_attr" => [
                    "class" => "form_group"
                ]
            ])
            ->add('actif', ChoiceType::class, [
                "expanded" => false,
                "multiple" => false,
                "required" => true,
                "mapped" => true,
                "choices" => [
                    "oui" => true,
                    "Non" => false,
                ],
                "row_attr" => [
                    "class" => "form_group"
                ],
                "label" => "Visible"
            ])
            ->add('background', ChoiceType::class, [
                "mapped" => true,
                "required" => true,
                "constraints" => [new NotBlank(["message" => "ce champs est obligatoire"])],
                "choices" => array_flip([
                    "couleur-creations-dev" => "couleurCreations",
                    "couleur-graphisme-gaming" => "couleurGraphisme",
                    "couleur-graphisme-entreprise" => "couleurGraphismeEntreprise",
                    "couleur-animation" => "couleurAnimation",
                    "couleur-option-commande" => "couleurOptionCommande",
                    "couleur-packs" => "couleurPacks",
                    "service-entreprise" => "Service Entreprise"
                ]),
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
