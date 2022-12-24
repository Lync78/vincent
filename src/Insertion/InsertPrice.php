<?php


namespace App\Insertion;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Price;

class InsertPrice
{

    private $em;

    private $tableau = [
        [
          "category_id" => 1,
          "category" => "créations et développement",
          "name" => "formule pack #1",
          "price" => 12,
        ],
        [
            "category_id" => 1,
            "category" => "créations et développement",
            "name" => "formule pack #2",
            "price" => 20,
        ],
        [
            "category_id" => 1,
            "category" => "créations et développement",
            "name" => "maquette",
            "price" => 12,
        ],
        [
            "category_id" => 2,
            "category" => "graphisme et jeux videos",
            "name" => "logo 2d",
            "price" => 10,
        ],
        [
            "category_id" => 2,
            "category" => "graphisme et jeux videos",
            "name" => "logo 3d",
            "price" => 40,
        ],
        [
            "category_id" => 2,
            "category" => "graphisme et jeux videos",
            "name" => "wallpaper",
            "price" => 5,
        ],
        [
            "category_id" => 2,
            "category" => "graphisme et jeux videos",
            "name" => "miniature",
            "price" => 3,
        ],
        [
            "category_id" => 2,
            "category" => "graphisme et jeux videos",
            "name" => "3 bannières",
            "price" => 5,
        ],
        [
            "category_id" => 2,
            "category" => "graphisme et jeux videos",
            "name" => "5 icons",
            "price" => 2,
        ],
        [
            "category_id" => 2,
            "category" => "graphisme et jeux videos",
            "name" => "6 badges",
            "price" => 2,
        ],
        [
            "category_id" => 2,
            "category" => "graphisme et jeux videos",
            "name" => "poster",
            "price" => 12,
        ],
        [
            "category_id" => 2,
            "category" => "graphisme et jeux videos",
            "name" => "sticker",
            "price" => 3,
        ],
        [
            "category_id" => 3,
            "category" => "graphisme-animation",
            "name" => "logo 2d",
            "price" => 15,
        ],
        [
            "category_id" => 3,
            "category" => "graphisme-animation",
            "name" => "logo 3d",
            "price" => 60,
        ],
        [
            "category_id" => 3,
            "category" => "graphisme-animation",
            "name" => "font",
            "price" => 6,
        ],
        [
            "category_id" => 3,
            "category" => "graphisme-animation",
            "name" => "overlay",
            "price" => 5,
        ],
        [
            "category_id" => 3,
            "category" => "graphisme-animation",
            "name" => "7 alerts complet",
            "price" => 5,
        ],
        [
            "category_id" => 3,
            "category" => "graphisme-animation",
            "name" => "debut live",
            "price" => 16,
        ],
        [
            "category_id" => 3,
            "category" => "graphisme-animation",
            "name" => "fin live",
            "price" => 12,
        ],
        [
            "category_id" => 3,
            "category" => "graphisme-animation",
            "name" => "switch",
            "price" => 8,
        ],

        [
            "category_id" => 3,
            "category" => "graphisme-animation",
            "name" => "scene pause",
            "price" => 10,
        ],
        [
            "category_id" => 3,
            "category" => "graphisme-animation",
            "name" => "hud",
            "price" => 3,
        ],
        [
            "category_id" => 4,
            "category" => "graphisme-entreprise",
            "name" => "logo 2d",
            "price" => 50,
        ],
        [
            "category_id" => 4,
            "category" => "graphisme-entreprise",
            "name" => "logo 3d",
            "price" => 80,
        ],
        [
            "category_id" => 4,
            "category" => "graphisme-entreprise",
            "name" => "logo 3d",
            "price" => 5,
        ],
        [
            "category_id" => 4,
            "category" => "graphisme-entreprise",
            "name" => "image",
            "price" => 5,
        ],
        [
            "category_id" => 4,
            "category" => "graphisme-entreprise",
            "name" => "banniere",
            "price" => 10,
        ],
        [
            "category_id" => 4,
            "category" => "graphisme-entreprise",
            "name" => "carte de visite",
            "price" => 8,
        ],
        [
            "category_id" => 4,
            "category" => "graphisme-entreprise",
            "name" => "flyer",
            "price" => 15,
        ],
        [
            "category_id" => 4,
            "category" => "graphisme-entreprise",
            "name" => "visuel entreprise",
            "price" => 25,
        ],
    ];

    public function __construct(EntityManagerInterface $entityManager){
        $this->em = $entityManager;
    }

    public function insertion(Price $price){
        foreach ($this->tableau as $data){
            foreach ($data as $value){

            }
        }


    }

}