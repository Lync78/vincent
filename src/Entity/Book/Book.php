<?php

namespace App\Entity\Book;

use App\Entity\EntityAbstract;
use App\Entity\trait\Titre;
use App\Helper\SlugifyHelper;
use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book extends EntityAbstract
{

    use Titre;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $description;

    #[ORM\OneToMany(mappedBy: "book", targetEntity: BookImage::class, orphanRemoval: true)]
    private ArrayCollection $bookImages;

    #[ORM\ManyToOne(targetEntity: BookCategory::class, inversedBy: "books")]
    #[ORM\JoinColumn(nullable: false)]
    private BookCategory $category;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $slug;


    /**
     * Book constructor.
     */
    public function __construct()
    {
        $this->bookImages = new ArrayCollection();
    }
    
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, BookImage>
     */
    public function getBookImages(): Collection
    {
        return $this->bookImages;
    }

    public function addBookImage(BookImage $bookImage): self
    {
        if (!$this->bookImages->contains($bookImage)) {
            $this->bookImages->add($bookImage);
            $bookImage->setBook($this);
        }

        return $this;
    }

    public function removeBookImage(BookImage $bookImage): self
    {
        if ($this->bookImages->removeElement($bookImage)) {
            // set the owning side to null (unless already changed)
            if ($bookImage->getBook() === $this) {
                $bookImage->setBook(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?BookCategory
    {
        return $this->category;
    }

    public function setCategory(?BookCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }



}
