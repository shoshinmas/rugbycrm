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
    #[ORM\Column(type: 'String')]
    private String $username;
    #[ORM\Column(type: 'String')]
    private String $fName;
    #[ORM\Column(type: 'String')]
    private String $sName;
    #[ORM\Column(type: 'String')]
    private String $type;
    #[ORM\Column(type: 'String')]
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
     * @return String
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param String $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return String
     */
    public function getFName(): string
    {
        return $this->fName;
    }

    /**
     * @param String $fName
     */
    public function setFName(string $fName): void
    {
        $this->fName = $fName;
    }

    /**
     * @return String
     */
    public function getSName(): string
    {
        return $this->sName;
    }

    /**
     * @param String $sName
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
     * @param String $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return String
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param String $status
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