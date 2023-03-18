<?php

namespace App\Entity;

use App\Repository\CarouselRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: CarouselRepository::class)]
class Carousel extends EntityAbstract
{

    #[ORM\Column(type: "boolean")]
    private bool $first;

    #[ORM\Column(type: "string", length: "255")]
    private ?string $image;

    public function getFirst(): ?bool
    {
        return $this->first;
    }

    public function setFirst(bool $first): self
    {
        $this->first = $first;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function isFirst(): ?bool
    {
        return $this->first;
    }
}
