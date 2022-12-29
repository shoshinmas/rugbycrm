<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PlayersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayersRepository::class)]
class Players
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private int $id;
    #[ORM\Column(type: 'string')]
    private string $firstname;
    #[ORM\Column(type: 'string')]
    private string $lastname;
    #[ORM\Column(type: 'boolean')]
    private bool $paidCurrentMonth;

    #[ORM\ManyToOne(inversedBy: 'playerId')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Clubs $clubId = null;

    #[ORM\OneToMany(mappedBy: 'playerPaymentsId', targetEntity: Payments::class)]
    private Collection $sumOfPayments;

    public function __construct()
    {
        $this->sumOfPayments = new ArrayCollection();
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
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
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

    /**
     * @return Collection<int, Payments>
     */
    public function getSumOfPayments(): Collection
    {
        return $this->sumOfPayments;
    }

    public function addSumOfPayment(Payments $sumOfPayment): self
    {
        if (!$this->sumOfPayments->contains($sumOfPayment)) {
            $this->sumOfPayments->add($sumOfPayment);
            $sumOfPayment->setPlayerPaymentsId($this);
        }

        return $this;
    }

    public function removeSumOfPayment(Payments $sumOfPayment): self
    {
        if ($this->sumOfPayments->removeElement($sumOfPayment)) {
            // set the owning side to null (unless already changed)
            if ($sumOfPayment->getPlayerPaymentsId() === $this) {
                $sumOfPayment->setPlayerPaymentsId(null);
            }
        }

        return $this;
    }


}