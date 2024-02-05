<?php 
class ListShopLikes {
    private $id;
    private $like;
    private $idShop;
    private $idUser;

    public function __construct(int $id, bool $like, int $idShop, int $idUser) {
        $this->id = $id;
        $this->like = $like;
        $this->idShop = $idShop;
        $this->idUser = $idUser;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function isLike(): bool
    {
        return $this->like;
    }

    public function setLike(bool $like): void
    {
        $this->like = $like;
    }

    public function getIdShop(): int
    {
        return $this->idShop;
    }

    public function setIdShop(int $idShop): void
    {
        $this->idShop = $idShop;
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