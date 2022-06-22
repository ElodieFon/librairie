<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titre;

    #[ORM\Column(type: 'date', nullable: true)]
    private $date_parution;

    #[ORM\Column(type: 'string', length: 400, nullable: true)]
    private $resume;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $edition;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $prix;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $langue;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $isbn;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $stock;

    #[ORM\ManyToOne(targetEntity: Auteur::class, inversedBy: 'livre')]
    private $auteur;

    #[ORM\OneToMany(mappedBy: 'livre', targetEntity: Genre::class)]
    private $genre;

    public function __construct()
    {
        $this->genre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDateParution(): ?\DateTimeInterface
    {
        return $this->date_parution;
    }

    public function setDateParution(?\DateTimeInterface $date_parution): self
    {
        $this->date_parution = $date_parution;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getEdition(): ?string
    {
        return $this->edition;
    }

    public function setEdition(?string $edition): self
    {
        $this->edition = $edition;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(?int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(?string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(?string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getAuteur(): ?Auteur
    {
        return $this->auteur;
    }

    public function setAuteur(?Auteur $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * @return Collection<int, Genre>
     */
    public function getGenre(): Collection
    {
        return $this->genre;
    }

    public function addGenre(Genre $genre): self
    {
        if (!$this->genre->contains($genre)) {
            $this->genre[] = $genre;
            $genre->setLivre($this);
        }

        return $this;
    }

    public function removeGenre(Genre $genre): self
    {
        if ($this->genre->removeElement($genre)) {
            // set the owning side to null (unless already changed)
            if ($genre->getLivre() === $this) {
                $genre->setLivre(null);
            }
        }

        return $this;
    }
}
