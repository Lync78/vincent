<?php

namespace App\Entity;

use App\Repository\BiographieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BiographieRepository::class)]
class Biographie extends EntityAbstract
{


    #[ORM\Column(type: "string", length: 255)]
    private ?string $pseudo;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $marque;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $texte_1;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $texte_2;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $texte_3;

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getTexte1(): ?string
    {
        return $this->texte_1;
    }

    public function setTexte1(?string $texte_1): self
    {
        $this->texte_1 = $texte_1;

        return $this;
    }

    public function getTexte2(): ?string
    {
        return $this->texte_2;
    }

    public function setTexte2(?string $texte_2): self
    {
        $this->texte_2 = $texte_2;

        return $this;
    }

    public function getTexte3(): ?string
    {
        return $this->texte_3;
    }

    public function setTexte3(?string $texte_3): self
    {
        $this->texte_3 = $texte_3;

        return $this;
    }
}
