<?php

namespace App\Entity;

use App\Repository\PackRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PackRepository::class)
 */
class Pack
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $horsLigne;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $banniere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $profil;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sceneStartLive;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sceneEndLive;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sceneBreak;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sceneGame;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sceneSwitch;
    
    /**
     * @ORM\OneToOne(targetEntity=Badges::class, mappedBy="pack", cascade={"persist", "remove"})
     */
    private $badges;

    /**
     * @ORM\OneToOne(targetEntity=Panneaux::class, mappedBy="Pack", cascade={"persist", "remove"})
     */
    private $panneaux;

    /**
     * @ORM\OneToOne(targetEntity=Alers::class, mappedBy="Pack", cascade={"persist", "remove"})
     */
    private $alers;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getHorsLigne(): ?string
    {
        return $this->horsLigne;
    }

    /**
     * @param string $horsLigne
     * @return $this
     */
    public function setHorsLigne(string $horsLigne): self
    {
        $this->horsLigne = $horsLigne;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBanniere(): ?string
    {
        return $this->banniere;
    }

    /**
     * @param string $banniere
     * @return $this
     */
    public function setBanniere(string $banniere): self
    {
        $this->banniere = $banniere;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getProfil(): ?string
    {
        return $this->profil;
    }

    /**
     * @param string $profil
     * @return $this
     */
    public function setProfil(string $profil): self
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSceneStartLive(): ?string
    {
        return $this->sceneStartLive;
    }

    /**
     * @param string $sceneStartLive
     * @return $this
     */
    public function setSceneStartLive(string $sceneStartLive): self
    {
        $this->sceneStartLive = $sceneStartLive;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSceneEndLive(): ?string
    {
        return $this->sceneEndLive;
    }

    /**
     * @param string $sceneEndLive
     * @return $this
     */
    public function setSceneEndLive(string $sceneEndLive): self
    {
        $this->sceneEndLive = $sceneEndLive;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSceneBreak(): ?string
    {
        return $this->sceneBreak;
    }

    /**
     * @param string $sceneBreak
     * @return $this
     */
    public function setSceneBreak(string $sceneBreak): self
    {
        $this->sceneBreak = $sceneBreak;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSceneGame(): ?string
    {
        return $this->sceneGame;
    }

    /**
     * @param string $sceneGame
     * @return $this
     */
    public function setSceneGame(string $sceneGame): self
    {
        $this->sceneGame = $sceneGame;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSceneSwitch(): ?string
    {
        return $this->sceneSwitch;
    }

    /**
     * @param string $sceneSwitch
     * @return $this
     */
    public function setSceneSwitch(string $sceneSwitch): self
    {
        $this->sceneSwitch = $sceneSwitch;

        return $this;
    }

    /**
     * @return Badges|null
     */
    public function getBadges(): ?Badges
    {
        return $this->badges;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return self
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @param Badges|null $badges
     * @return $this
     */
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

    public function setPanneaux(?Panneaux $Pack): self
    {
        // unset the owning side of the relation if necessary
        if ($Pack === null && $this->panneaux !== null) {
            $this->panneaux->setPack(null);
        }

        // set the owning side of the relation if necessary
        if ($Pack !== null && $Pack->getPack() !== $this) {
            $Pack->setPack($this);
        }

        $this->Pack = $Pack;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getAlers(): ?Alers
    {
        return $this->alers;
    }

    public function setAlers(Alers $alers): self
    {
        // set the owning side of the relation if necessary
        if ($alers->getPack() !== $this) {
            $alers->setPack($this);
        }

        $this->alers = $alers;

        return $this;
    }

}
