<?php

namespace App\Entity\trait;

use Doctrine\ORM\Mapping as ORM;

trait Titre
{
    #[ORM\Column(type: "string", length: 255)]
    private string $title;

    /**
     * @return string
     */
    public function getTitle(): string
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

}