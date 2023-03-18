<?php

namespace App\Form;

use App\Entity\Exclusivite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\File;

class ExclusiviteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('img', FileType::class, [
                "required" => true,
                "mapped" => false,
                "attr" => [
                    "accept" => ".png"
                ],
                "constraints" => [
                    new File([
                        "maxSize" => "1024k",
                        "mimeTypes" => ["image/png"],
                        "mimeTypesMessage" => "Seul les fichiers au format PNG sont autorisé"
                    ])
                ]
            ])
            ->add('title', TextType::class, [
                "required" => true,
                "mapped" => true,
                "constraints" => [
                    new NotBlank(["message"=>"ce champs est obligatoire"])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Exclusivite::class,
        ]);
    }
}
