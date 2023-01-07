<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ApiResource]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;


    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Boat::class)]
    private Collection $boats;

    public function __construct()
    {
        $this->boats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }


    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection<int, Boat>
     */
    public function getBoats(): Collection
    {
        return $this->boats;
    }

    public function addBoat(Boat $boat): self
    {
        if (!$this->boats->contains($boat)) {
            $this->boats->add($boat);
            $boat->setClient($this);
        }

        return $this;
    }

    public function removeBoat(Boat $boat): self
    {
        if ($this->boats->removeElement($boat)) {
            // set the owning side to null (unless already changed)
            if ($boat->getClient() === $this) {
                $boat->setClient(null);
            }
        }

        return $this;
    }
    
    //Overriding the existing __toString() method
    public function __toString(){
        return $this->getName();
    }
}
