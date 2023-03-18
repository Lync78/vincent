<?php

namespace App\Entity;

use App\Repository\BadgesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BadgesRepository::class)]
#[ORM\Table("badges")]
class Badges extends EntityAbstract
{
    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $oneMonth;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $TwoMonth;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $ThreeMonth;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $sixMonth;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $nineMonth;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $OneYear;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $OneYearHalf;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $TwoYearMore;

    #[ORM\OneToOne(mappedBy: "pack", targetEntity: Pack::class, cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "pack_id",nullable: false)]
    private Pack $pack;

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
