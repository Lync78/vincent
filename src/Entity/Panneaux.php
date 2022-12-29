<?php

namespace App\Entity;

use App\Helper\SlugifyHelper;
use App\Repository\PanneauxRepository;
use App\Tools\FileUploader;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\FormInterface;

#[ORM\Entity(repositoryClass: PanneauxRepository::class)]
class Panneaux extends EntityAbstract
{

    public function __construct(FormInterface $form)
    {

    }

    public function push(){

    }

    #[ORM\Column(type: "string", length: "255", nullable: true)]
    private ?string $slot1;

    #[ORM\Column(type: "string", length: "255", nullable: true)]
    private ?string $slot2;

    #[ORM\Column(type: "string", length: "255", nullable: true)]
    private ?string $slot3;

    #[ORM\Column(type: "string", length: "255", nullable: true)]
    private ?string $slot4;

    #[ORM\Column(type: "string", length: "255", nullable: true)]
    private ?string $slot5;

    #[ORM\Column(type: "string", length: "255", nullable: true)]
    private ?string $slot6;

    #[ORM\Column(type: "string", length: "255", nullable: true)]
    private ?string $slot7;

    #[ORM\Column(type: "string", length: "255", nullable: true)]
    private ?string $slot8;

    #[ORM\Column(type: "string", length: "255", nullable: true)]
    private ?string $slot9;

    #[ORM\Column(type: "string", length: "255", nullable: true)]
    private ?string $slot10;

    #[ORM\Column(type: "string", length: "255", nullable: true)]
    private ?string $slot11;

    #[ORM\Column(type: "string", length: "255", nullable: true)]
    private ?string $slot12;

    #[ORM\OneToOne(mappedBy: "pack", targetEntity: Pack::class, cascade: ["persist","remove"])]
    #[ORM\JoinColumn(name: "pack_id", nullable: false)]
    private Pack $pack;

    public function getSlot1(): ?string
    {
        return $this->slot1;
    }

    public function setSlot1(?string $slot1): self
    {
        $this->slot1 = $slot1;

        return $this;
    }

    public function getSlot2(): ?string
    {
        return $this->slot2;
    }

    public function setSlot2(?string $slot2): self
    {
        $this->slot2 = $slot2;

        return $this;
    }

    public function getSlot3(): ?string
    {
        return $this->slot3;
    }

    public function setSlot3(?string $slot3): self
    {
        $this->slot3 = $slot3;

        return $this;
    }

    public function getSlot4(): ?string
    {
        return $this->slot4;
    }

    public function setSlot4(?string $slot4): self
    {
        $this->slot4 = $slot4;

        return $this;
    }

    public function getSlot5(): ?string
    {
        return $this->slot5;
    }

    public function setSlot5(?string $slot5): self
    {
        $this->slot5 = $slot5;

        return $this;
    }

    public function getSlot6(): ?string
    {
        return $this->slot6;
    }

    public function setSlot6(?string $slot6): self
    {
        $this->slot6 = $slot6;

        return $this;
    }

    public function getSlot7(): ?string
    {
        return $this->slot7;
    }

    public function setSlot7(?string $slot7): self
    {
        $this->slot7 = $slot7;

        return $this;
    }

    public function getSlot8(): ?string
    {
        return $this->slot8;
    }

    public function setSlot8(?string $slot8): self
    {
        $this->slot8 = $slot8;

        return $this;
    }

    public function getSlot9(): ?string
    {
        return $this->slot9;
    }

    public function setSlot9(?string $slot9): self
    {
        $this->slot9 = $slot9;

        return $this;
    }

    public function getSlot10(): ?string
    {
        return $this->slot10;
    }

    public function setSlot10(?string $slot10): self
    {
        $this->slot10 = $slot10;

        return $this;
    }

    public function getSlot11(): ?string
    {
        return $this->slot11;
    }

    public function setSlot11(?string $slot11): self
    {
        $this->slot11 = $slot11;

        return $this;
    }

    public function getSlot12(): ?string
    {
        return $this->slot12;
    }

    public function setSlot12(?string $slot12): self
    {
        $this->slot12 = $slot12;

        return $this;
    }

    public function getPack(): Pack
    {
        return $this->pack;
    }

    public function setPack(?Pack $Pack): self
    {
        $this->pack = $Pack;

        return $this;
    }
}
