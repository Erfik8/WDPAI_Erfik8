<?php

class ListProductUser {
    private $id;
    private $idProduct;
    private $idUser;

    public function __construct(int $id, int $idProduct, int $idUser) {
        $this->id = $id;
        $this->idProduct = $idProduct;
        $this->idUser = $idUser;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getIdProduct(): int
    {
        return $this->idProduct;
    }

    public function setIdProduct(int $idProduct): void
    {
        $this->idProduct = $idProduct;
    }

    public function getIdUser(): int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }
}

?>