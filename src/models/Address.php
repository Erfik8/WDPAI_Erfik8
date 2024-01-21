<?php

class Address {
    private $id;
    private $street;
    private $postalCode;
    private $accommodation;
    private $city;

    public function __construct(
        int $id,
        string $street,
        string $postalCode,
        string $accommodation,
        string $city
    ) {
        $this->id = $id;
        $this->street = $street;
        $this->postalCode = $postalCode;
        $this->accommodation = $accommodation;
        $this->city = $city;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    public function getAccommodation(): string
    {
        return $this->accommodation;
    }

    public function setAccommodation(string $accommodation): void
    {
        $this->accommodation = $accommodation;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }
}

?>