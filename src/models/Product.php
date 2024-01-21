<?php 
class Product {
    private $id;
    private $name;
    private $idCategory;
    private $glutenFree;
    private $vegan;
    private $vegetarian;
    private $lactoseFree;
    private $description;
    private $logoLink;
    private $idCompany;

    public function __construct(
        int $id,
        string $name,
        int $idCategory,
        bool $glutenFree,
        bool $vegan,
        bool $vegetarian,
        bool $lactoseFree,
        string $description,
        ?string $logoLink,
        int $idCompany
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->idCategory = $idCategory;
        $this->glutenFree = $glutenFree;
        $this->vegan = $vegan;
        $this->vegetarian = $vegetarian;
        $this->lactoseFree = $lactoseFree;
        $this->description = $description;
        $this->logoLink = $logoLink;
        $this->idCompany = $idCompany;
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

    public function getIdCategory(): int
    {
        return $this->idCategory;
    }

    public function setIdCategory(int $idCategory): void
    {
        $this->idCategory = $idCategory;
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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getLogoLink(): ?string
    {
        return $this->logoLink;
    }

    public function setLogoLink(?string $logoLink): void
    {
        $this->logoLink = $logoLink;
    }

    public function getIdCompany(): int
    {
        return $this->idCompany;
    }

    public function setIdCompany(int $idCompany): void
    {
        $this->idCompany = $idCompany;
    }
}

?>