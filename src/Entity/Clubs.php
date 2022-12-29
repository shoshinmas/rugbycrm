<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Clubs
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private int $id;
    #[ORM\Column(type: 'string')]
    private string $clubName;
    #[ORM\Column(type: 'string')]
    private string $streetAddress;
    #[ORM\Column(type: 'string')]
    private string $zipCode;
    #[ORM\Column(type: 'string')]
    private string $city;
    #[ORM\Column(type: 'string')]
    private string $country;

    #[ORM\OneToMany(mappedBy: 'clubId', targetEntity: Players::class)]
    private Collection $playerId;

    public function __construct()
    {
        $this->playerId = new ArrayCollection();
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getClubName(): string
    {
        return $this->clubName;
    }

    /**
     * @param string $clubName
     */
    public function setClubName(string $clubName): void
    {
        $this->clubName = $clubName;
    }

    /**
     * @return string
     */
    public function getStreetAddress(): string
    {
        return $this->streetAddress;
    }

    /**
     * @param string $streetAddress
     */
    public function setStreetAddress(string $streetAddress): void
    {
        $this->streetAddress = $streetAddress;
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     */
    public function setZipCode(string $zipCode): void
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return Collection<int, Players>
     */
    public function getPlayerId(): Collection
    {
        return $this->playerId;
    }

    public function addPlayerId(Players $playerId): self
    {
        if (!$this->playerId->contains($playerId)) {
            $this->playerId->add($playerId);
            $playerId->setClubId($this);
        }

        return $this;
    }

    public function removePlayerId(Players $playerId): self
    {
        if ($this->playerId->removeElement($playerId)) {
            // set the owning side to null (unless already changed)
            if ($playerId->getClubId() === $this) {
                $playerId->setClubId(null);
            }
        }

        return $this;
    }


}