<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PlayersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayersRepository::class)]
class Players
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private int $id;
    #[ORM\Column(type: 'String')]
    private String $firstname;
    #[ORM\Column(type: 'String')]
    private String $lastname;
    #[ORM\Column(type: 'integer')]
    private int $sumOfPayments;
    #[ORM\Column(type: 'boolean')]
    private bool $paidCurrentMonth;

    #[ORM\ManyToOne(inversedBy: 'playerId')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Clubs $clubId = null;

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
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param String $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return String
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param String $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }


    /**
     * @return int
     */
    public function getSumOfPayments(): int
    {
        return $this->sumOfPayments;
    }

    /**
     * @param int $sumOfPayments
     */
    public function setSumOfPayments(int $sumOfPayments): void
    {
        $this->sumOfPayments = $sumOfPayments;
    }

    /**
     * @return bool
     */
    public function isPaidCurrentMonth(): bool
    {
        return $this->paidCurrentMonth;
    }

    /**
     * @param bool $paidCurrentMonth
     */
    public function setPaidCurrentMonth(bool $paidCurrentMonth): void
    {
        $this->paidCurrentMonth = $paidCurrentMonth;
    }

    public function getClubId(): ?Clubs
    {
        return $this->clubId;
    }

    public function setClubId(?Clubs $clubId): self
    {
        $this->clubId = $clubId;

        return $this;
    }


}