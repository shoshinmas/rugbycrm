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
    #[ORM\Column(type: 'integer')]
    private int $userId;
    #[ORM\Column(type: 'String')]
    private String $month;
    #[ORM\Column(type: 'integer')]
    private int $amount;
    #[ORM\Column(type: 'String')]
    private String $byWhat;

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
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return String
     */
    public function getMonth(): string
    {
        return $this->month;
    }

    /**
     * @param String $month
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
     * @return String
     */
    public function getByWhat(): string
    {
        return $this->byWhat;
    }

    /**
     * @param String $byWhat
     */
    public function setByWhat(string $byWhat): void
    {
        $this->byWhat = $byWhat;
    }


}