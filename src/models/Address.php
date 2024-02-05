<?php

require_once __DIR__.'/City.php';

class Address {
    private $id;
    private $street;
    private $postalCode;
    private $accommodation;
    private $cityId;
    public $cityObject;     
    public function __construct(
        int $id,
        string $street,
        string $postalCode,
        string $accommodation,
        int $cityId
    ) {
        $this->id = $id;
        $this->street = $street;
        $this->postalCode = $postalCode;
        $this->accommodation = $accommodation;
        $this->cityId = $cityId;
        $this->cityObject = null;
    }

    public function getAddress(): string
    {
        return $this->street." ".$this->accommodation.", ".$this->cityObject->getName()." ".$this->postalCode;
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

    public function getCity(): int
    {
        return $this->city;
    }

    public function setCity(int $cityId): void
    {
        $this->cityId = $cityId;
    }

    public function getCityObject(): ?City
    {
        return $this->cityObject;
    }
    public function setCityObject(?City $cityObject): void 
    {
        $this->cityObject = $cityObject;
    }
}

?>