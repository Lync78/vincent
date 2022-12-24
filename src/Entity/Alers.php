<?php

namespace App\Entity;

use App\Repository\AlersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlersRepository::class)
 */
class Alers
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
    private $alertsFollow;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alertsDonation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alertsBits;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alertsSubscribe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alertsHost;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alertsRaid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alertsSubgift;

    /**
     * @ORM\OneToOne(targetEntity=Pack::class, inversedBy="alers", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Pack;

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

    public function setAlertsBits(string $AlertsBits): self
    {
        $this->alertsBits = $AlertsBits;

        return $this;
    }

    public function getAlertsSubscribe(): ?string
    {
        return $this->alertsSubscribe;
    }

    public function setAlertsSubscribe(string $AlertsSubscribe): self
    {
        $this->alertsSubscribe = $AlertsSubscribe;

        return $this;
    }

    public function getAlertsHost(): ?string
    {
        return $this->alertsHost;
    }

    public function setAlertsHost(string $AlertsHost): self
    {
        $this->alertsHost = $AlertsHost;

        return $this;
    }

    public function getAlertsRaid(): ?string
    {
        return $this->alertsRaid;
    }

    public function setAlertsRaid(string $AlertsRaid): self
    {
        $this->alertsRaid = $AlertsRaid;

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
        return $this->Pack;
    }

    public function setPack(Pack $Pack): self
    {
        $this->Pack = $Pack;

        return $this;
    }
}
