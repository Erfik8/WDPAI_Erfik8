<?php

class User {
    private $id;
    private $email;
    private $password;
    private $name;
    private $surname;
    private $idUserType;
    private $logoLink;
    private $premiumEndingDate;
    private $idCity;

    public function __construct(
        int $id,
        string $email,
        string $password,
        string $name,
        string $surname,
        int $idUserType,
        string $logoLink,
        ?DateTime $premiumEndingDate,
        int $idCity
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->idUserType = $idUserType;
        $this->logoLink = $logoLink;
        if ($premiumEndingDate == NULL)
        {
            $this->premiumEndingDate = new DateTime();
        }
        else
        {
            $this->premiumEndingDate = $premiumEndingDate;
        }
        $this->idCity = $idCity;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getIdUserType(): ?int
    {
        return $this->idUserType;
    }

    public function setIdUserType(?int $idUserType): void
    {
        $this->idUserType = $idUserType;
    }

    public function getLogoLink(): ?string
    {
        return $this->logoLink;
    }

    public function setLogoLink(?string $logoLink): void
    {
        $this->logoLink = $logoLink;
    }

    public function getPremiumEndingDate(): ?DateTime
    {
        return $this->premiumEndingDate;
    }

    public function setPremiumEndingDate(?DateTime $premiumEndingDate): void
    {
        $this->premiumEndingDate = $premiumEndingDate;
    }

    public function getIdCity(): ?int
    {
        return $this->idCity;
    }

    public function setIdCity(?int $idCity): void
    {
        $this->idCity = $idCity;
    }
}
