<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use App\Repository\BoatRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[UniqueEntity('name')]
#[Entity(repositoryClass: BoatRepository::class)]
class Boat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero]
    private ?int $loa = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero]
    private ?int $beam = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero]
    private ?float $draft = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $year = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(min: 2, max: 255)]
    private ?string $builder = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(min: 2, max: 255)]
    private ?string $material = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero]
    private ?int $accomodation = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(min: 2, max: 255)]
    private ?string $engines = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero]
    private ?int $range = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero]
    private ?int $cruise_speed = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero]
    private ?int $max_speed = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(min: 2, max: 255)]
    private ?string $price = null;

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

    public function getLoa(): ?int
    {
        return $this->loa;
    }

    public function setLoa(?int $loa): static
    {
        $this->loa = $loa;

        return $this;
    }

    public function getBeam(): ?int
    {
        return $this->beam;
    }

    public function setBeam(?int $beam): static
    {
        $this->beam = $beam;

        return $this;
    }

    public function getDraft(): ?float
    {
        return $this->draft;
    }

    public function setDraft(?float $draft): static
    {
        $this->draft = $draft;

        return $this;
    }

    public function getYear(): ?\DateTimeImmutable
    {
        return $this->year;
    }

    public function setYear(?\DateTimeImmutable $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getBuilder(): ?string
    {
        return $this->builder;
    }

    public function setBuilder(?string $builder): static
    {
        $this->builder = $builder;

        return $this;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setMaterial(?string $material): static
    {
        $this->material = $material;

        return $this;
    }

    public function getAccomodation(): ?int
    {
        return $this->accomodation;
    }

    public function setAccomodation(?int $accomodation): static
    {
        $this->accomodation = $accomodation;

        return $this;
    }

    public function getEngines(): ?string
    {
        return $this->engines;
    }

    public function setEngines(?string $engines): static
    {
        $this->engines = $engines;

        return $this;
    }

    public function getRange(): ?int
    {
        return $this->range;
    }

    public function setRange(?int $range): static
    {
        $this->range = $range;

        return $this;
    }

    public function getCruiseSpeed(): ?int
    {
        return $this->cruise_speed;
    }

    public function setCruiseSpeed(?int $cruise_speed): static
    {
        $this->cruise_speed = $cruise_speed;

        return $this;
    }

    public function getMaxSpeed(): ?int
    {
        return $this->max_speed;
    }

    public function setMaxSpeed(?int $max_speed): static
    {
        $this->max_speed = $max_speed;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): static
    {
        $this->price = $price;

        return $this;
    }
}
