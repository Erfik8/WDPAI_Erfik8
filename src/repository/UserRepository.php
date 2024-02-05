<?php

require_once 'Repository.php';
require_once 'CityRepository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/City.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Users"WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['id'],
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['id_user_type'],
            $user['logo_link'],
            $user['premium_ending_date'],
            $user['id_city']
        );
    }
    public function getUserById(int $id): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."Users"WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['id'],
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['id_user_type'],
            $user['logo_link'],
            $user['premium_ending_date'],
            $user['id_city']
        );
    }
    public function createUser(string $name, string $surname, string $login, string $pass, int $idCity, string $photoLink = "")
    {
        
            $stmt = $this->database->connect()->prepare('
            INSERT INTO public."Users"(
                email, password, name, surname, id_user_type, logo_link, id_city)
                VALUES (:email, :pass, :name, :surname, 1, :photo,:idCity);');
            $stmt->bindParam(':email', $login, PDO::PARAM_STR);
            $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
            $stmt->bindParam(':photo', $photoLink, PDO::PARAM_STR);
            $stmt->bindParam(':idCity', $idCity, PDO::PARAM_INT);
            $stmt->execute();
    }

    public function updateUser(User $user): void 
    {
        $stmt = $this->database->connect()->prepare('
        UPDATE public."Users"
        SET email=:email, name=:name, surname=:surname, logo_link=:logo_link, id_city=:id_city
        WHERE id = :id;
        ');
        $stmt->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':name', $user->getName(), PDO::PARAM_STR);
        $stmt->bindParam(':surname', $user->getSurname(), PDO::PARAM_STR);
        $stmt->bindParam(':logo_link', $user->getLogoLink(), PDO::PARAM_STR);
        $stmt->bindParam(':id_city', $user->getIdCity(), PDO::PARAM_INT);
        $stmt->bindParam(':id', $user->getId(), PDO::PARAM_INT);
        $stmt->execute();

    }
}