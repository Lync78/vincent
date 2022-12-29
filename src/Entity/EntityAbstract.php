<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class EntityAbstract
{

    #[ORM\GeneratedValue]
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    protected ?int $id;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }



}