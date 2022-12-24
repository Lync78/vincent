<?php

namespace App\Entity;

use App\Helper\SlugifyHelper;
use App\Repository\PanneauxRepository;
use App\Tools\FileUploader;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\FormInterface;

/**
 * @ORM\Entity(repositoryClass=PanneauxRepository::class)
 */
class Panneaux
{

    public function __construct(FormInterface $form)
    {

    }

    public function push(){

    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slot1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slot2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slot3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slot4;

    /**
     * @ORM\Column (type="string", length=255, nullable=true)
     */
    private $slot5;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slot6;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slot7;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slot8;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slot9;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slot10;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slot11;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slot12;

    /**
     * @ORM\OneToOne(targetEntity=Pack::class, inversedBy="Pack", cascade={"persist", "remove"})
     */
    private $Pack;

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
    public function getSlot1(): ?string
    {
        return $this->slot1;
    }

    /**
     * @param string $slot1
     * @return $this
     */
    public function setSlot1(string $slot1): self
    {
        $this->slot1 = $slot1;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlot2(): ?string
    {
        return $this->slot2;
    }

    /**
     * @param string|null $slot2
     * @return $this
     */
    public function setSlot2(?string $slot2): self
    {
        $this->slot2 = $slot2;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlot3(): ?string
    {
        return $this->slot3;
    }

    /**
     * @param string|null $slot3
     * @return $this
     */
    public function setSlot3(?string $slot3): self
    {
        $this->slot3 = $slot3;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlot4(): ?string
    {
        return $this->slot4;
    }

    /**
     * @param string|null $slot4
     * @return $this
     */
    public function setSlot4(?string $slot4): self
    {
        $this->slot4 = $slot4;

        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getSlot5(): ?string
    {
        return $this->slot5;
    }

    /**
     * @param string|null $slot5
     * @return self
     */
    public function setSlot5(?string $slot5): self
    {
        $this->slot5 = $slot5;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlot6(): ?string
    {
        return $this->slot6;
    }

    /**
     * @param string|null $slot6
     * @return $this
     */
    public function setSlot6(?string $slot6): self
    {
        $this->slot6 = $slot6;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlot7(): ?string
    {
        return $this->slot7;
    }

    /**
     * @param string|null $slot7
     * @return $this
     */
    public function setSlot7(?string $slot7): self
    {
        $this->slot7 = $slot7;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlot8(): ?string
    {
        return $this->slot8;
    }

    /**
     * @param string|null $slot8
     * @return $this
     */
    public function setSlot8(?string $slot8): self
    {
        $this->slot8 = $slot8;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlot9(): ?string
    {
        return $this->slot9;
    }

    /**
     * @param string|null $slot9
     * @return $this
     */
    public function setSlot9(?string $slot9): self
    {
        $this->slot9 = $slot9;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlot10(): ?string
    {
        return $this->slot10;
    }

    /**
     * @param string|null $slot10
     * @return $this
     */
    public function setSlot10(?string $slot10): self
    {
        $this->slot10 = $slot10;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlot11(): ?string
    {
        return $this->slot11;
    }

    /**
     * @param string|null $slot11
     * @return $this
     */
    public function setSlot11(?string $slot11): self
    {
        $this->slot11 = $slot11;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlot12(): ?string
    {
        return $this->slot12;
    }

    /**
     * @param string|null $slot12
     * @return $this
     */
    public function setSlot12(?string $slot12): self
    {
        $this->slot12 = $slot12;

        return $this;
    }

    /**
     * @return Pack|null
     */
    public function getPack(): ?Pack
    {
        return $this->Pack;
    }

    /**
     * @param Pack|null $Pack
     * @return $this
     */
    public function setPack(?Pack $Pack): self
    {
        $this->Pack = $Pack;

        return $this;
    }
}
