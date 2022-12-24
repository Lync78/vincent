<?php

namespace App\Form;

use App\Entity\Carousel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

class AddCarouselType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('image', FileType::class, [
                "required" => true,
                "constraints" => [
                    new NotBlank(),
                    new All([
                        new File([
                            "maxSize" => "8M",
                            "mimeTypes" => ["image/jpeg","image/png"],
                        ]),
                    ])
                ],
                "mapped" => true,
                "attr" => [
                    "accept" => "image/jpeg, image/png",
                    "multiple" => true,
                ],
                "label_attr" => [
                    "for" => "add_carousel_image",
                    "class" => "label_custom"
                ],
                "label" => "Télécharger des images"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Carousel::class,
        ]);
    }
}
