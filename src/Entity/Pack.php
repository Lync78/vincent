<?php

namespace App\Entity;

use App\Entity\trait\Titre;
use App\Repository\PackRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: PackRepository::class)]
class Pack extends EntityAbstract
{
    use Titre;

    #[ORM\Column(type: "string", length: 255)]
    private string $slug;

    #[ORM\Column(type: "string", length: 255)]
    private string $description;

    #[ORM\Column(type: "string", length: 255)]
    private string $horsLigne;

    #[ORM\Column(type: "string", length: 255)]
    private string $banniere;

    #[ORM\Column(type: "string", length: 255)]
    private string $profil;

    #[ORM\Column(type: "string", length: 255)]
    private string $sceneStartLive;

    #[ORM\Column(type: "string", length: 255)]
    private string $sceneEndLive;

    #[ORM\Column(type: "string", length: 255)]
    private string $sceneBreak;

    #[ORM\Column(type: "string", length: 255)]
    private string $sceneGame;

    #[ORM\Column(type: "string", length: 255)]
    private string $sceneSwitch;

    #[ORM\OneToOne(mappedBy: "pack", targetEntity: Badges::class, cascade: ["persist", "remove"])]
    private Badges $badges;

    #[ORM\OneToOne(mappedBy: "pack", targetEntity: Panneaux::class, cascade: ["persist", "remove"])]
    private Panneaux $panneaux;

    #[ORM\OneToOne(mappedBy: "pack", targetEntity: Alers::class, cascade: ["persist","remove"])]
    private Alers $alers;

    public function getHorsLigne(): ?string
    {
        return $this->horsLigne;
    }

    public function setHorsLigne(string $horsLigne): self
    {
        $this->horsLigne = $horsLigne;

        return $this;
    }

    public function getBanniere(): ?string
    {
        return $this->banniere;
    }

    public function setBanniere(string $banniere): self
    {
        $this->banniere = $banniere;

        return $this;
    }

    public function getProfil(): ?string
    {
        return $this->profil;
    }

    public function setProfil(string $profil): self
    {
        $this->profil = $profil;

        return $this;
    }

    public function getSceneStartLive(): ?string
    {
        return $this->sceneStartLive;
    }

    public function setSceneStartLive(string $sceneStartLive): self
    {
        $this->sceneStartLive = $sceneStartLive;

        return $this;
    }

    public function getSceneEndLive(): ?string
    {
        return $this->sceneEndLive;
    }

    public function setSceneEndLive(string $sceneEndLive): self
    {
        $this->sceneEndLive = $sceneEndLive;

        return $this;
    }

    public function getSceneBreak(): ?string
    {
        return $this->sceneBreak;
    }

    public function setSceneBreak(string $sceneBreak): self
    {
        $this->sceneBreak = $sceneBreak;

        return $this;
    }

    public function getSceneGame(): ?string
    {
        return $this->sceneGame;
    }

    public function setSceneGame(string $sceneGame): self
    {
        $this->sceneGame = $sceneGame;

        return $this;
    }

    public function getSceneSwitch(): ?string
    {
        return $this->sceneSwitch;
    }

    public function setSceneSwitch(string $sceneSwitch): self
    {
        $this->sceneSwitch = $sceneSwitch;

        return $this;
    }

    public function getBadges(): ?Badges
    {
        return $this->badges;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function setBadges(?Badges $badges): self
    {
        // unset the owning side of the relation if necessary
        if ($badges === null && $this->badges !== null) {
            $this->badges->setPack(null);
        }

        // set the owning side of the relation if necessary
        if ($badges !== null && $badges->getPack() !== $this) {
            $badges->setPack($this);
        }

        $this->badges = $badges;

        return $this;
    }

    public function getPanneaux(): ?Panneaux
    {
        return $this->panneaux;
    }

    public function setPanneaux(?Panneaux $panneaux): self
    {
        // unset the owning side of the relation if necessary
        if ($panneaux === null && $this->panneaux !== null) {
            $this->panneaux->setPack(null);
        }

        // set the owning side of the relation if necessary
        if ($panneaux !== null && $panneaux->getPack() !== $this) {
            $panneaux->setPack($this);
        }

        $this->panneaux = $panneaux;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAlers(): ?Alers
    {
        return $this->alers;
    }

    public function setAlers(?Alers $alers): self
    {
        // unset the owning side of the relation if necessary
        if ($alers === null && $this->alers !== null) {
            $this->alers->setPack(null);
        }

        // set the owning side of the relation if necessary
        if ($alers !== null && $alers->getPack() !== $this) {
            $alers->setPack($this);
        }

        $this->alers = $alers;

        return $this;
    }

}
