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
    #[ORM\Column(type: 'String')]
    private String $clubName;
    #[ORM\Column(type: 'String')]
    private String $streetAddress;
    #[ORM\Column(type: 'String')]
    private String $zipCode;
    #[ORM\Column(type: 'String')]
    private String $city;
    #[ORM\Column(type: 'String')]
    private String $country;

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
     * @return String
     */
    public function getClubName(): string
    {
        return $this->clubName;
    }

    /**
     * @param String $clubName
     */
    public function setClubName(string $clubName): void
    {
        $this->clubName = $clubName;
    }

    /**
     * @return String
     */
    public function getStreetAddress(): string
    {
        return $this->streetAddress;
    }

    /**
     * @param String $streetAddress
     */
    public function setStreetAddress(string $streetAddress): void
    {
        $this->streetAddress = $streetAddress;
    }

    /**
     * @return String
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @param String $zipCode
     */
    public function setZipCode(string $zipCode): void
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return String
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param String $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return String
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param String $country
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