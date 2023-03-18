<?php

namespace App\Entity\Book;

use App\Entity\EntityAbstract;
use App\Repository\BookImageRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: BookImageRepository::class)]
class BookImage extends EntityAbstract
{

    #[ORM\Column(type: "string", length: 255)]
    private ?string $image;

    #[ORM\ManyToOne(targetEntity: Book::class, inversedBy: "bookImages")]
    #[ORM\JoinColumn(nullable: false)]
    private Book $book;

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }
}
