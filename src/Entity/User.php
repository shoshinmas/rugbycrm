<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private int $id;
    #[ORM\Column(type: 'string')]
    private String $username;
    #[ORM\Column(type: 'string')]
    private String $fName;
    #[ORM\Column(type: 'string')]
    private String $sName;
    #[ORM\Column(type: 'string')]
    private String $type;
    #[ORM\Column(type: 'string')]
    private String $status;
    #[ORM\Column(type: 'string')]
    private array $balance;

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
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getFName(): string
    {
        return $this->fName;
    }

    /**
     * @param string $fName
     */
    public function setFName(string $fName): void
    {
        $this->fName = $fName;
    }

    /**
     * @return string
     */
    public function getSName(): string
    {
        return $this->sName;
    }

    /**
     * @param string $sName
     */
    public function setSName(string $sName): void
    {
        $this->sName = $sName;
    }

    /**
     * @return String
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return array
     */
    public function getBalance(): array
    {
        return $this->balance;
    }

    /**
     * @param array $balance
     */
    public function setBalance(array $balance): void
    {
        $this->balance = $balance;
    }


}