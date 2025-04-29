<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateR = null;

    #[ORM\Column(length: 255)]
    private ?string $etatR = null;

    /**
     * @var Collection<int, Projection>
     */
    #[ORM\OneToMany(targetEntity: Projection::class, mappedBy: 'reserv')]
    private Collection $projections;

    /**
     * @var Collection<int, User>
     */
    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'reserv')]
    private Collection $users;

    public function __construct()
    {
        $this->projections = new ArrayCollection();
        $this->users = new ArrayCollection();
    }
    
    public function __toString(): string
    {
        return (string) $this->id; 
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateR(): ?\DateTimeInterface
    {
        return $this->dateR;
    }

    public function setDateR(\DateTimeInterface $dateR): static
    {
        $this->dateR = $dateR;

        return $this;
    }

    public function getEtatR(): ?string
    {
        return $this->etatR;
    }

    public function setEtatR(string $etatR): static
    {
        $this->etatR = $etatR;

        return $this;
    }

    /**
     * @return Collection<int, Projection>
     */
    public function getProjections(): Collection
    {
        return $this->projections;
    }

    public function addProjection(Projection $projection): static
    {
        if (!$this->projections->contains($projection)) {
            $this->projections->add($projection);
            $projection->setReserv($this);
        }

        return $this;
    }

    public function removeProjection(Projection $projection): static
    {
        if ($this->projections->removeElement($projection)) {
            // set the owning side to null (unless already changed)
            if ($projection->getReserv() === $this) {
                $projection->setReserv(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setReserv($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getReserv() === $this) {
                $user->setReserv(null);
            }
        }

        return $this;
    }
}
