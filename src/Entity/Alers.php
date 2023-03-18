<?php

namespace App\Entity;

use App\Repository\AlersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlersRepository::class)]
class Alers extends EntityAbstract
{
    #[ORM\Column(type: "string", length: 255)]
    private ?string $alertsFollow;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $alertsDonation;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $alertsBits;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $alertsSubscribe;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $alertsHost;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $alertsRaid;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $alertsSubgift;

    #[ORM\OneToOne(inversedBy: "alers", targetEntity: Pack::class, cascade: ["persist","remove"])]
    #[ORM\JoinColumn(name: "pack_id",nullable: false)]
    private Pack $pack;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlertsFollow(): ?string
    {
        return $this->alertsFollow;
    }

    public function setAlertsFollow(string $alertsFollow): self
    {
        $this->alertsFollow = $alertsFollow;

        return $this;
    }

    public function getAlertsDonation(): ?string
    {
        return $this->alertsDonation;
    }

    public function setAlertsDonation(string $alertsDonation): self
    {
        $this->alertsDonation = $alertsDonation;

        return $this;
    }

    public function getAlertsBits(): ?string
    {
        return $this->alertsBits;
    }

    public function setAlertsBits(string $alertsBits): self
    {
        $this->alertsBits = $alertsBits;

        return $this;
    }

    public function getAlertsSubscribe(): ?string
    {
        return $this->alertsSubscribe;
    }

    public function setAlertsSubscribe(string $alertsSubscribe): self
    {
        $this->alertsSubscribe = $alertsSubscribe;

        return $this;
    }

    public function getAlertsHost(): ?string
    {
        return $this->alertsHost;
    }

    public function setAlertsHost(string $alertsHost): self
    {
        $this->alertsHost = $alertsHost;

        return $this;
    }

    public function getAlertsRaid(): ?string
    {
        return $this->alertsRaid;
    }

    public function setAlertsRaid(string $alertsRaid): self
    {
        $this->alertsRaid = $alertsRaid;

        return $this;
    }

    public function getAlertsSubgift(): ?string
    {
        return $this->alertsSubgift;
    }

    public function setAlertsSubgift(string $alertsSubgift): self
    {
        $this->alertsSubgift = $alertsSubgift;

        return $this;
    }

    public function getPack(): ?Pack
    {
        return $this->pack;
    }

    public function setPack(Pack $Pack): self
    {
        $this->pack = $Pack;

        return $this;
    }
}
