<?php

namespace App\Entity;

use App\Repository\PriceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PriceRepository::class)]
class Price extends EntityAbstract
{

    #[ORM\Column(type: "integer")]
    private ?int $category_id;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $category;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $name;

    #[ORM\Column(type: "integer")]
    private ?int $price;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $argu1;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $argu2;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $argu3;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $format;


    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCategoryId(): ?int
    {
        return $this->category_id;
    }

    public function setCategoryId(int $category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getArgu1(): ?string
    {
        return $this->argu1;
    }

    public function setArgu1(?string $argu1): self
    {
        $this->argu1 = $argu1;

        return $this;
    }

    public function getArgu2(): ?string
    {
        return $this->argu2;
    }

    public function setArgu2(?string $argu2): self
    {
        $this->argu2 = $argu2;

        return $this;
    }

    public function getArgu3(): ?string
    {
        return $this->argu3;
    }

    public function setArgu3(?string $argu3): self
    {
        $this->argu3 = $argu3;

        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(?string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function affichage(): string
    {
        return $this->price > 1 ? $this->price . "euros" : $this->price . "euro";
    }
}
