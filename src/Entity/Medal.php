<?php

namespace App\Entity;

use App\Repository\MedalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedalRepository::class)]
class Medal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $color = null;

    #[ORM\Column(length: 100)]
    private ?string $category = null;

    #[ORM\Column]
    private ?int $point = null;

    #[ORM\ManyToOne(inversedBy: 'medals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sport $sport = null;

    #[ORM\ManyToOne(inversedBy: 'medals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Nation $nation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getPoint(): ?int
    {
        return $this->point;
    }

    public function setPoint(int $point): static
    {
        $this->point = $point;

        return $this;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function setSport(?Sport $sport): static
    {
        $this->sport = $sport;

        return $this;
    }

    public function getNation(): ?Nation
    {
        return $this->nation;
    }

    public function setNation(?Nation $nation): static
    {
        $this->nation = $nation;

        return $this;
    }
}