<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PaymentsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentsRepository::class)]
class Payments
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private int $id;
    #[ORM\Column(type: 'string')]
    private string $month;
    #[ORM\Column(type: 'integer')]
    private int $amount;
    #[ORM\Column(type: 'string')]
    private string $byWhat;

    #[ORM\ManyToOne(inversedBy: 'sumOfPayments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Players $playerPaymentsId = null;

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
    public function getMonth(): string
    {
        return $this->month;
    }

    /**
     * @param string $month
     */
    public function setMonth(string $month): void
    {
        $this->month = $month;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getByWhat(): string
    {
        return $this->byWhat;
    }

    /**
     * @param string $byWhat
     */
    public function setByWhat(string $byWhat): void
    {
        $this->byWhat = $byWhat;
    }

    public function getPlayerPaymentsId(): ?Players
    {
        return $this->playerPaymentsId;
    }

    public function setPlayerPaymentsId(?Players $playerPaymentsId): self
    {
        $this->playerPaymentsId = $playerPaymentsId;

        return $this;
    }


}