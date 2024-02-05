<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/UserType.php';

class UserTypeRepository extends Repository
{

    public function getUserTypeById(int $id): ?UserType
    {
        $stmt = $this->database->connect()->prepare('
        SELECT id, name, value
        FROM public."User_type" where id=:id;
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $userType = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userType == false) {
            return null;
        }

        return new UserType(
            $userType['id'],
            $userType['name'],
            $userType['value']
        );
    }
}