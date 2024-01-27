<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Shop.php';
require_once __DIR__.'/../models/Address.php';
require_once __DIR__.'/../models/City.php';

class ShopRepository extends Repository
{

    public function getShopById(int $id): ?Shop
    {
        $stmt = $this->database->connect()->prepare('
        SELECT 
        public."Shops".id, 
        public."Shops".name as shop_name, 
        id_adress, 
        google_share_link, 
        logo_link,
        photo_link, 
        gluten_free, 
        vegan,
        vegatarian,
        lactose_free,
        street, 
        postal_code, 
        accomodation, 
        id_city,
        google_embeded_link,
        public."City".name as city_name
                FROM public."Shops" 
                left join public."Adresses" on public."Shops".id_adress = public."Adresses".id
                left join public."City" on public."Adresses".id_city = public."City".id
            WHERE public."Shops".id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();


        $shop = $stmt->fetch(PDO::FETCH_ASSOC);
        if($shop == false)
        {
            return null;
        }

        $shop = $this->getShopFromFetch($shop);
        return $shop;
    }
    public function getShopsByPhrase(string $phrase = "", int $offset = 0, int $city_id = -1): ?array
    {
        $query_str = '
	    SELECT 
        public."Shops".id,
        public."Shops".name as shop_name, 
        google_share_link, 
        logo_link,
        photo_link, 
        gluten_free, 
        vegan, 
        vegatarian, 
        lactose_free,
        public."Adresses".id as id_adress,
        street,
        postal_code,
        accomodation,
        google_embeded_link,
        public."City".id as id_city,
        public."City".name as city_name
            FROM public."Shops"
            left join public."Adresses" on public."Adresses".id = public."Shops".id_adress
            left join public."City" on public."City".id = public."Adresses".id_city
            where LOWER(public."Shops".name) like LOWER(:phrase)';
        
        if ($city_id != -1)
        {
            $query_str .= ' and where public."City".id = :id';
        }
        $query_str .= ' limit 10 offset :offset;';

        $stmt = $this->database->connect()->prepare($query_str);
        $phrase = "%".$phrase."%";
        $stmt->bindParam(':phrase', $phrase, PDO::PARAM_STR);
        if ($city_id != -1)
        {
            $stmt->bindParam(':id', $city_id, PDO::PARAM_INT);
        }
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $shops = array();

        $shop = $stmt->fetch(PDO::FETCH_ASSOC);

        while ($shop != false)
        {
            $shop = $this->getShopFromFetch($shop);
            array_push($shops,$shop);
            $shop = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $shops;
    }
    public function getShopsByCityName(string $name, int $offest = 0): ?array
    {
        $stmt = $this->database->connect()->prepare('
        SELECT 
        public."Shops".id, 
        public."Shops".name as shop_name, 
        id_adress, 
        google_share_link, 
        logo_link, 
        photo_link,
        gluten_free, 
        vegan,
        vegatarian,
        lactose_free,
        street, 
        postal_code, 
        accomodation, 
        id_city,
        google_embeded_link,
        public."City".name as city_name
                FROM public."Shops" 
                left join public."Adresses" on public."Shops".id_adress = public."Adresses".id
                left join public."City" on public."Adresses".id_city = public."City".id
        where public."City".name = :name
        limit 10 offset :offset
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':offset', $offest, PDO::PARAM_INT);
        $stmt->execute();

        $shops = array();
        
        $shop = $stmt->fetch(PDO::FETCH_ASSOC);
        while ($shop != false)
        {
            $shop = $this->getShopFromFetch($shop);
            array_push($shops,$shop);
            $shop = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $shops;
    }
    public function getShopsByCityId(int $id, int $offest = 0): ?array
    {
        $stmt = $this->database->connect()->prepare('
        SELECT 
        public."Shops".id, 
        public."Shops".name as shop_name, 
        id_adress, 
        google_share_link, 
        logo_link,
        photo_link, 
        gluten_free, 
        vegan,
        vegatarian,
        lactose_free,
        street, 
        postal_code, 
        accomodation, 
        id_city,
        google_embeded_link,
        public."City".name as city_name
                FROM public."Shops" 
                left join public."Adresses" on public."Shops".id_adress = public."Adresses".id
                left join public."City" on public."Adresses".id_city = public."City".id
        where public."City".id = :id
        limit 10 offset :offset;
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':offset', $offest, PDO::PARAM_INT);
        $stmt->execute();

        $shops = array();
        
        $shop = $stmt->fetch(PDO::FETCH_ASSOC);
        while ($shop != false)
        {
            $shop = $this->getShopFromFetch($shop);
            array_push($shops,$shop);
            $shop = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $shops;
    }

    private function getShopFromFetch($row): ?Shop
    {
        $shop = new Shop(
            $row['id'],
            $row['shop_name'],
            $row['id_adress'],
            $row['google_map_link'],
            $row['logo_link'],
            $row['photo_link'],
            $row['gluten_free'],
            $row['vegan'],
            $row['vegatarian'],
            $row['lactose_free'],
            $row['google_embeded_link']
        );
        
        $shop->setAddressObject(new Address(
            $row['id_adress'],
            $row['street'],
            $row['postal_code'],
            $row['accomodation'],
            $row['id_city'],
        ));
        $shop->addressObject->setCityObject(new City(
            $row['id_city'],
            $row['city_name']
        ));
        return $shop;
    }
}