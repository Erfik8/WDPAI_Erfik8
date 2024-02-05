<?php 
require_once __DIR__.'/Address.php';

class Shop {
    private $id;
    private $name;
    private $idAddress;
    private $googleShareLink;
    private $logoLink;
    private $photoLink;
    private $glutenFree;
    private $vegan;
    private $vegetarian;
    private $lactoseFree;
    private $googleEmbeddedLink;
    public $addressObject;

    public function __construct(
        int $id,
        string $name,
        int $idAddress,
        ?string $googleMapLink,
        ?string $logoLink,
        string $photoLink,
        bool $glutenFree,
        bool $vegan,
        bool $vegetarian,
        bool $lactoseFree,
        string $googleEmbeddedLink
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->idAddress = $idAddress;
        $this->googleMapLink = $googleMapLink;
        $this->logoLink = $logoLink;
        $this->photoLink = $photoLink;
        $this->glutenFree = $glutenFree;
        $this->vegan = $vegan;
        $this->vegetarian = $vegetarian;
        $this->lactoseFree = $lactoseFree;
        $this->googleEmbeddedLink = $googleEmbeddedLink;
        $this->addressObject = null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(int $size = 0): string
    {
        if ($size == 0) return $this->name;
        else
        {
            $ret_val = substr($this->name,0,$size);
            if ($ret_val == $this->name)
            {
                return $ret_val;
            }
            $ret_val = $ret_val."...";
            return $ret_val;
        }
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
    public function getPhotoLink(): string
    {
        return $this->photoLink;
    }
    public function setPhotoLink(string $photoLink): void
    {
        $this->photoLink = $photoLink;
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

    public function setgoogleEmbeddedLink(string $googleEmbeddedLink): variant_mod
    {
        $this->googleEmbeddedLink = $googleEmbeddedLink;
    }

    public function getgoogleEmbeddedLink(): string
    {
        return $this->googleEmbeddedLink; 
    }

    public function setAddressObject(?Address $obj): void 
    {
        $this->addressObject = $obj;
    }

    public function getAddressObject(): ?Address
    {
        return $this->addressObject;
    }
}

?>