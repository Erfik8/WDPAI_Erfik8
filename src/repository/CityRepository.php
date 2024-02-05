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
    public function getCityById(int $id): ?City
    {
        $stmt = $this->database->connect()->prepare('
        SELECT id, name
	    FROM public."City" where id=:id;');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $city = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($city == false) {
            return null;
        }

        return new City(
            $city['id'],
            $city['name']
        );
    }
    public function getCityIdByName($cityName): int 
    {
        return $this->getElementIdByColumnValue('"City"','name',$cityName);
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