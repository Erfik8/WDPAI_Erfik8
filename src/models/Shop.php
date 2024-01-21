<?php 
class Shop {
    private $id;
    private $name;
    private $idAddress;
    private $googleMapLink;
    private $logoLink;
    private $glutenFree;
    private $vegan;
    private $vegetarian;
    private $lactoseFree;
    private $idCity;

    public function __construct(
        int $id,
        string $name,
        int $idAddress,
        ?string $googleMapLink,
        ?string $logoLink,
        bool $glutenFree,
        bool $vegan,
        bool $vegetarian,
        bool $lactoseFree,
        ?int $idCity
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->idAddress = $idAddress;
        $this->googleMapLink = $googleMapLink;
        $this->logoLink = $logoLink;
        $this->glutenFree = $glutenFree;
        $this->vegan = $vegan;
        $this->vegetarian = $vegetarian;
        $this->lactoseFree = $lactoseFree;
        $this->idCity = $idCity;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getIdAddress(): int
    {
        return $this->idAddress;
    }

    public function setIdAddress(int $idAddress): void
    {
        $this->idAddress = $idAddress;
    }

    public function getGoogleMapLink(): ?string
    {
        return $this->googleMapLink;
    }

    public function setGoogleMapLink(?string $googleMapLink): void
    {
        $this->googleMapLink = $googleMapLink;
    }

    public function getLogoLink(): ?string
    {
        return $this->logoLink;
    }

    public function setLogoLink(?string $logoLink): void
    {
        $this->logoLink = $logoLink;
    }

    public function isGlutenFree(): bool
    {
        return $this->glutenFree;
    }

    public function setGlutenFree(bool $glutenFree): void
    {
        $this->glutenFree = $glutenFree;
    }

    public function isVegan(): bool
    {
        return $this->vegan;
    }

    public function setVegan(bool $vegan): void
    {
        $this->vegan = $vegan;
    }

    public function isVegetarian(): bool
    {
        return $this->vegetarian;
    }

    public function setVegetarian(bool $vegetarian): void
    {
        $this->vegetarian = $vegetarian;
    }

    public function isLactoseFree(): bool
    {
        return $this->lactoseFree;
    }

    public function setLactoseFree(bool $lactoseFree): void
    {
        $this->lactoseFree = $lactoseFree;
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

?>