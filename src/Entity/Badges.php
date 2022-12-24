<?php

namespace App\Entity;

use App\Repository\BadgesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BadgesRepository::class)
 */
class Badges
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $oneMonth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TwoMonth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ThreeMonth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sixMonth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nineMonth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $OneYear;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $OneYearHalf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TwoYearMore;

    /**
     * @ORM\OneToOne(targetEntity=Pack::class, inversedBy="badges", cascade={"persist", "remove"})
     */
    private $pack;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOneMonth(): ?string
    {
        return $this->oneMonth;
    }

    public function setOneMonth(?string $oneMonth): self
    {
        $this->oneMonth = $oneMonth;

        return $this;
    }

    public function getTwoMonth(): ?string
    {
        return $this->TwoMonth;
    }

    public function setTwoMonth(?string $TwoMonth): self
    {
        $this->TwoMonth = $TwoMonth;

        return $this;
    }

    public function getThreeMonth(): ?string
    {
        return $this->ThreeMonth;
    }

    public function setThreeMonth(?string $ThreeMonth): self
    {
        $this->ThreeMonth = $ThreeMonth;

        return $this;
    }

    public function getSixMonth(): ?string
    {
        return $this->sixMonth;
    }

    public function setSixMonth(?string $sixMonth): self
    {
        $this->sixMonth = $sixMonth;

        return $this;
    }

    public function getNineMonth(): ?string
    {
        return $this->nineMonth;
    }

    public function setNineMonth(?string $nineMonth): self
    {
        $this->nineMonth = $nineMonth;

        return $this;
    }

    public function getOneYear(): ?string
    {
        return $this->OneYear;
    }

    public function setOneYear(?string $OneYear): self
    {
        $this->OneYear = $OneYear;

        return $this;
    }

    public function getOneYearHalf(): ?string
    {
        return $this->OneYearHalf;
    }

    public function setOneYearHalf(?string $OneYearHalf): self
    {
        $this->OneYearHalf = $OneYearHalf;

        return $this;
    }

    public function getTwoYearMore(): ?string
    {
        return $this->TwoYearMore;
    }

    public function setTwoYearMore(?string $TwoYearMore): self
    {
        $this->TwoYearMore = $TwoYearMore;

        return $this;
    }

    public function getPack(): ?Pack
    {
        return $this->pack;
    }

    public function setPack(?Pack $pack): self
    {
        $this->pack = $pack;

        return $this;
    }
}
