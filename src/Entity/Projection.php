<?php

namespace App\Entity;

use App\Repository\ProjectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectionRepository::class)]
class Projection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateProjection = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $salle = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbrPlaces = null;

    #[ORM\ManyToOne(inversedBy: 'projections')]
    private ?Reservation $reserv = null;

    /**
     * @var Collection<int, Film>
     */
    #[ORM\OneToMany(targetEntity: Film::class, mappedBy: 'projec')]
    private Collection $films;

    public function __construct()
    {
        $this->films = new ArrayCollection();
    }

    public function __toString(): string
    {
        return (string) $this->id; 
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateProjection(): ?\DateTimeInterface
    {
        return $this->dateProjection;
    }

    public function setDateProjection(\DateTimeInterface $dateProjection): static
    {
        $this->dateProjection = $dateProjection;

        return $this;
    }

    public function getSalle(): ?string
    {
        return $this->salle;
    }

    public function setSalle(?string $salle): static
    {
        $this->salle = $salle;

        return $this;
    }

    public function getNbrPlaces(): ?int
    {
        return $this->nbrPlaces;
    }

    public function setNbrPlaces(?int $nbrPlaces): static
    {
        $this->nbrPlaces = $nbrPlaces;

        return $this;
    }

    public function getReserv(): ?Reservation
    {
        return $this->reserv;
    }

    public function setReserv(?Reservation $reserv): static
    {
        $this->reserv = $reserv;

        return $this;
    }

    /**
     * @return Collection<int, Film>
     */
    public function getFilms(): Collection
    {
        return $this->films;
    }

    public function addFilm(Film $film): static
    {
        if (!$this->films->contains($film)) {
            $this->films->add($film);
            $film->setProjec($this);
        }

        return $this;
    }

    public function removeFilm(Film $film): static
    {
        if ($this->films->removeElement($film)) {
            // set the owning side to null (unless already changed)
            if ($film->getProjec() === $this) {
                $film->setProjec(null);
            }
        }

        return $this;
    }
}
