<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/CityRepository.php';

class SecurityController extends AppController {

    public function login()
    {
        if(!isset($_COOKIE['user']))
        {
            $userRepository = new UserRepository();
    
            if (!$this->isPost()) {
                return $this->render('login');
            }
    
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $user = $userRepository->getUser($email);
    
            if (!$user) {
                return $this->render('login', ['messages' => ['User not found!']]);
            }
    
            if ($user->getEmail() !== $email) {
                return $this->render('login', ['messages' => ['User with this email not exist!']]);
            }
    
            if (password_verify($password, $user->getPassword())){
                return $this->render('login', ['messages' => ['Wrong password!'.$password." - ".$user->getPassword()]]);
            }
    
            $cookie_name = 'user';
            $cookie_val = $user->getId();
            setcookie($cookie_name,strval($cookie_val),time() + (85400 * 15), "/");
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard/");
    }

    public function register()
    {
        if(!isset($_COOKIE['user']))
        {
            $userRepository = new UserRepository();
            $cityRepository = new CityRepository();
    
            if (!$this->isPost()) {
                $cities = $cityRepository->getCities();
                return $this->render('register', ['cities' => $cities]);
            }
    
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cityName = $_POST['city'];

    
            $user = $userRepository->getUser($email);
            $cityId = $cityRepository->getCityIdByName($cityName);

            $userRepository->createUser($name,$surname,$email,password_hash(password_hash($pass, PASSWORD_BCRYPT), PASSWORD_BCRYPT), $cityId);

        }
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard/");
    }

    public function logout()
    {
        if(isset($_COOKIE['user']))
        {
            setcookie('user',$_COOKIE['user'],time()-1,"/");
        }
        return $this->render('login');
    }
}