<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\NationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
#[ORM\Entity(repositoryClass: NationRepository::class)]
class Nation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    /**
     * @var Collection<int, Medal>
     */
    #[ORM\OneToMany(targetEntity: Medal::class, mappedBy: 'nation', orphanRemoval: true)]
    private Collection $medals;

    public function __construct()
    {
        $this->medals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Medal>
     */
    public function getMedals(): Collection
    {
        return $this->medals;
    }

    public function addMedal(Medal $medal): static
    {
        if (!$this->medals->contains($medal)) {
            $this->medals->add($medal);
            $medal->setNation($this);
        }

        return $this;
    }

    public function removeMedal(Medal $medal): static
    {
        if ($this->medals->removeElement($medal)) {
            // set the owning side to null (unless already changed)
            if ($medal->getNation() === $this) {
                $medal->setNation(null);
            }
        }

        return $this;
    }
}
