<?php

namespace App\Entity\Book;

use App\Helper\SlugifyHelper;
use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=BookImage::class, mappedBy="book", orphanRemoval=true)
     */
    private $bookImages;

    /**
     * @ORM\ManyToOne(targetEntity=BookCategory::class, inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;


    /**
     * Book constructor.
     */
    public function __construct()
    {
        $this->bookImages = new ArrayCollection();
    }

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
    public function getTitle(): ?string
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

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
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

    /**
     * @param BookImage $bookImage
     * @return $this
     */
    public function addBookImage(BookImage $bookImage): self
    {
        if (!$this->bookImages->contains($bookImage)) {
            $this->bookImages[] = $bookImage;
            $bookImage->setBook($this);
        }

        return $this;
    }

    /**
     * @param BookImage $bookImage
     * @return $this
     */
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

    /**
     * @return BookCategory|null
     */
    public function getCategory(): ?BookCategory
    {
        return $this->category;
    }

    /**
     * @param BookCategory|null $category
     * @return $this
     */
    public function setCategory(?BookCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }


    public function setSlug(): void
    {
        $this->slug = SlugifyHelper::slugify($this->title);
    }



}
