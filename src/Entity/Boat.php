<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\BoatRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[UniqueEntity('name')]
#[ORM\Entity(repositoryClass: BoatRepository::class)]
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
    private ?int $boatRange = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero]
    private ?int $cruise_speed = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero]
    private ?int $max_speed = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(min: 2, max: 255)]
    private ?string $price = null;

    #[ORM\OneToMany(mappedBy: 'Boat', targetEntity: BoatImage::class)]
    private Collection $boatImages;

    public function __construct()
    {
        $this->boatImages = new ArrayCollection();
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

    public function getBoatRange(): ?int
    {
        return $this->boatRange;
    }

    public function setBoatRange(?int $boatRange): static
    {
        $this->boatRange = $boatRange;

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

    /**
     * @return Collection<int, BoatImage>
     */
    public function getBoatImages(): Collection
    {
        return $this->boatImages;
    }

    public function addBoatImage(BoatImage $boatImage): static
    {
        if (!$this->boatImages->contains($boatImage)) {
            $this->boatImages->add($boatImage);
            $boatImage->setBoat($this);
        }

        return $this;
    }

    public function removeBoatImage(BoatImage $boatImage): static
    {
        if ($this->boatImages->removeElement($boatImage)) {
            // set the owning side to null (unless already changed)
            if ($boatImage->getBoat() === $this) {
                $boatImage->setBoat(null);
            }
        }

        return $this;
    }
}
