<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Product.php';
require_once __DIR__.'/../models/Category.php';
require_once __DIR__.'/../models/Company.php';

class ProductRepository extends Repository
{

    public function getProductById(int $id): ?Product
    {
        $stmt = $this->database->connect()->prepare('
        SELECT 
        public."Products".id, 
        public."Products".name as product_name, 
        id_category,
        gluten_free,
        vegan,
        vegetarian,
        lactose_free, 
        description,
        logo_link,
        id_company,
        public."Category".name as category_name,
        public."Company".name as company_name,
        country
            FROM public."Products"
            left join public."Category" on public."Category".id = public."Products".id_category
            left join public."Company" on public."Company".id = public."Products".id_company
            WHERE public."Products".id = :id;
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        if($product == false)
        {
            return null;
        }

        $product = $this->getProductFromFetch($product);
        return $product;

        
    }
    public function getProductsByPhrase(string $phrase = "", int $offset = 0): ?array
    {
        $stmt = $this->database->connect()->prepare('
	    SELECT 
        public."Products".id, 
        public."Products".name as product_name, 
        id_category,
        gluten_free,
        vegan,
        vegetarian,
        lactose_free, 
        description,
        logo_link,
        id_company,
        public."Category".name as category_name,
        public."Company".name as company_name,
        country
            FROM public."Products"
            left join public."Category" on public."Category".id = public."Products".id_category
            left join public."Company" on public."Company".id = public."Products".id_company
        where LOWER(public."Products".name) like LOWER(:phrase) limit 10 offset :offset;
        ');
        $phrase = "%".$phrase."%";
        $stmt->bindParam(':phrase', $phrase, PDO::PARAM_STR);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $products = array();

        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        while ($product != false)
        {
            $product = $this->getProductFromFetch($product);
            array_push($products,$product);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $products;
    }
    public function getNumberOfRowsByPhrase(string $phrase): ?int
    {
        $stmt = $this->database->connect()->prepare('
        SELECT count(*) as row_num
	    FROM public."Products" where LOWER(name) like LOWER(:phrase)
        ');
        $stmt->bindParam(':phrase', "%".$phrase."%", PDO::PARAM_STR);
        $stmt->execute();

        $row_num = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row_num == false) {
            return null;
        }

        return $row_num;
    }
    private function getProductFromFetch($result): Product 
    {

        $product = new Product(
            $result['id'],
            $result['product_name'],
            $result['id_category'],
            $result['gluten_free'],
            $result['vegan'],
            $result['vegetarian'],
            $result['lactose_free'],
            $result['description'],
            $result['logo_link'],
            $result['id_company']
        );

        $product->setCompanyObject(new Company(
            $result['id_company'],
            $result['company_name'],
            $result['country']
        ));

        $product->setCategoryObject(new Category(
            $result['id_category'],
            $result['category_name']
        ));

        return $product;
    }
}