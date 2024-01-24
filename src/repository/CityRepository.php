<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/City.php';

class CityRepository extends Repository
{

    public function getCities(): ?array
    {
        $stmt = $this->database->connect()->prepare('
        SELECT id, name
	    FROM public."City";');
        $stmt->execute();

        $cities = array();
        
        $city = $stmt->fetch(PDO::FETCH_ASSOC);
        while ($city != false)
        {
            $city = $this->getCityFromFetch($city);
            array_push($cities,$city);
            $city = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $cities;
    }
    public function getCityIdByName($cityName): int 
    {
        $stmt = $this->database->connect()->prepare('
        SELECT id
        FROM public."City" where name=:name;
        ');
        $stmt->bindParam(':name', $cityName, PDO::PARAM_STR);
        $stmt->execute();

        $city = $stmt->fetch(PDO::FETCH_ASSOC);
        return $city['id'];
    }
    private function getCityFromFetch($row): ?City
    {
        $city = new City(
            $row['id'],
            $row['name']
        );
        return $city;
    }
}