<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Company.php';

class CompanyRepository extends Repository
{

    public function getCompanies(): ?array
    {
        $stmt = $this->database->connect()->prepare('
        SELECT id, name, country
	    FROM public."Company";');
        $stmt->execute();

        $companies = array();
        
        $company = $stmt->fetch(PDO::FETCH_ASSOC);
        while ($company != false)
        {
            $company = $this->getCompanyFromFetch($company);
            array_push($companies,$company);
            $company = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $companies;
    }
    public function getCompanyIdByName($companyName): int 
    {
        return $this->getElementIdByColumnValue('"Company"','name',$companyName);
    }
    function createCompany(string $companyName) : void 
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO public."Company"(
            name, country)
            VALUES (:name, :country);');
        $country = 'Poland';
        $stmt->bindParam(':name', $companyName, PDO::PARAM_STR);
        $stmt->bindParam(':country',$country,PDO::PARAM_STR);
        $stmt->execute();
    }
    private function getCompanyFromFetch($row): ?Company
    {
        $company = new Company(
            $row['id'],
            $row['name'],
            $row['country']
        );
        return $company;
    }
}