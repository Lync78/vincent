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
    private ?string $name;

    #[ORM\Column(type: "integer")]
    private ?int $price;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $color;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $argu1;

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

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @param string|null $color
     */
    public function setColor(?string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string|null
     */
    public function getArgu1(): ?string
    {
        return $this->argu1;
    }

    /**
     * @param string|null $argu1
     */
    public function setArgu1(?string $argu1): void
    {
        $this->argu1 = $argu1;
    }

    public function affichage(): string
    {
        return $this->price > 1 ? $this->price . "euros" : $this->price . "euro";
    }
}
