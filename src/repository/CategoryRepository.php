<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Category.php';

class CategoryRepository extends Repository
{

    public function getCategories(): ?array
    {
        $stmt = $this->database->connect()->prepare('
        SELECT id, name
	    FROM public."Category";');
        $stmt->execute();

        $categories = array();
        
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        while ($category != false)
        {
            $category = $this->getCategoryFromFetch($category);
            array_push($categories,$category);
            $category = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $categories;
    }
    public function getCategoryIdByName($categoryname): int 
    {
        return $this->getElementIdByColumnValue('"Category"','name',$categoryName);
    }
    function createCategory($categoryName) : void 
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO public."Category"(name)
            VALUES (:name);');
        $stmt->bindParam(':name', $categoryName, PDO::PARAM_STR);
        $stmt->execute();
    }
    private function getCategoryFromFetch($row): ?Category
    {
        $category = new Category(
            $row['id'],
            $row['name']
        );
        return $category;
    }
}