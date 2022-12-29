<?php

namespace App\Entity;

use App\Entity\trait\Titre;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ORM\Table(name: 'category')]
class Category extends EntityAbstract
{

    use Titre;

    #[ORM\OneToMany(mappedBy: "category", targetEntity: Service::class, orphanRemoval: true)]
    private ArrayCollection $services;

    #[Pure] public function __construct()
    {
        $this->services = new ArrayCollection();
    }
    
    /**
     * @return Collection<int, Service>
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services->add($service);
            $service->setCategory($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->services->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getCategory() === $this) {
                $service->setCategory(null);
            }
        }

        return $this;
    }
}
