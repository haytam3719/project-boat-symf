<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BoatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BoatRepository::class)]
#[ApiResource]
class Boat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private ?float $price_per_day = null;

    #[ORM\Column]
    private ?float $internal_volume = null;

    #[ORM\Column]
    private ?float $weight = null;

    #[ORM\ManyToOne(inversedBy: 'boats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPricePerDay(): ?float
    {
        return $this->price_per_day;
    }

    public function setPricePerDay(float $price_per_day): self
    {
        $this->price_per_day = $price_per_day;

        return $this;
    }

    public function getInternalVolume(): ?float
    {
        return $this->internal_volume;
    }

    public function setInternalVolume(float $internal_volume): self
    {
        $this->internal_volume = $internal_volume;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
    public function __toString(){
        return $this->getType();
    }
}
