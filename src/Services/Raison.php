<?php


namespace App\Services;


class Raison
{

    private $raisons = [
        "question(s)",
        "création d'un projet",
    ];


    public function getRaison($value){
        return $this->raisons[$value];
    }

}