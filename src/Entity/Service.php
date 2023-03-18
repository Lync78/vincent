<?php

namespace App\Entity;

use App\Entity\trait\Titre;
use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
#[ORM\Table(name: 'service')]
class Service extends EntityAbstract
{

    use Titre;
    
    #[ORM\Column(type: "string", length: "255")]
    private ?string $description = null;

    #[ORM\Column(type: "string", length: "255")]
    private string $position;

    #[ORM\Column(type: "string", length: 255)]
    private string $sbtitle;

    #[ORM\Column(type: "boolean")]
    private bool $actif;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: "services")]
    #[ORM\JoinColumn(nullable: false)]
    private Category $category;

    #[ORM\Column(length: 255)]
    private ?string $background = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getSbtitle(): ?string
    {
        return $this->sbtitle;
    }

    public function setSbtitle(string $sbtitle): self
    {
        $this->sbtitle = $sbtitle;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function isActif(): ?bool
    {
        return $this->actif;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(string $background): self
    {
        $this->background = $background;

        return $this;
    }

}
