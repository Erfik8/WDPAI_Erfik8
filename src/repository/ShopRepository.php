<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Shop.php';

class ShopRepository extends Repository
{

    public function getProductById(int $id): ?Shop
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Products"WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product == false) {
            return null;
        }

        return new Product(
            $product['id'],
            $product['name'],
            $product['id_adress'],
            $product['google_map_link'],
            $product['logo_link'],
            $product['gluten_free'],
            $product['vegan'],
            $product['vegatarian'],
            $product['lactose_free'],
            $product['lactose_free']
        );
    }
    public function getProductsByCityName(string $name): ?array
    {
        $stmt = $this->database->connect()->prepare('
        SELECT *
        FROM public."Shops" 
        left join public."Adresses" on public."Shops".id_adress = public."Adresses".id
        left join public."City" on public."Adresses".id_city = public."City".id
        where public."City".name = :name
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();

        $products = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($products == false) {
            return null;
        }

        $products = array_map(fn($product): ?Product => new Product(
            $product['id'],
            $product['name'],
            $product['id_adress'],
            $product['google_map_link'],
            $product['logo_link'],
            $product['gluten_free'],
            $product['vegan'],
            $product['vegatarian'],
            $product['lactose_free'],
            $product['lactose_free']
        ), $products)

        return $products
    }
}