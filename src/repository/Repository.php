<?php

require_once __DIR__.'/../../Database.php';

class Repository {
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getElementIdByColumnValue(string $tableName, string $columnName, mixed $searchVal): int 
    {
        $stmt = $this->database->connect()->prepare(' 
        SELECT public."getIdFromTableByProperty"(:table_name, :column_name,:search_val) as id
        ');
        $stmt->bindParam(':table_name', $tableName, PDO::PARAM_STR);
        $stmt->bindParam(':column_name', $columnName, PDO::PARAM_STR);
        if (gettype($searchVal) == "boolean")
        {
            $stmt->bindParam(':search_val', $searchVal, PDO::PARAM_BOOL);
        }
        elseif(gettype($searchVal) == "integer")
        {
            $stmt->bindParam(':search_val', $searchVal, PDO::PARAM_INT);
        }
        elseif(gettype($searchVal) == "NULL")
        {
            $stmt->bindParam(':search_val', $searchVal, PDO::PARAM_NULL);
        }
        else 
        {
            $stmt->bindParam(':search_val', $searchVal, PDO::PARAM_STR);
        }
        $stmt->execute();

        $element = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($element == false)
        {
            return -1;
        }
        else
        {
            return $element['id'];
        } 
    }
}