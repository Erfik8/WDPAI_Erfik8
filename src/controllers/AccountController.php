<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/CityRepository.php';
require_once __DIR__.'/../repository/UserTypeRepository.php';

class AccountController extends AppController {

    private $message = [];
    private $userRepository;
    private $cityRepository;
    private $userTypeRepository;
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const PRODUCT_LOGO_DIRECTORY = '/public/images/products/';

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->cityRepository = new CityRepository();
        $this->userTypeRepository= new UserTypeRepository();
    }
    
    public function userSettings()
    {
        if(isset($_COOKIE['user']))
        {
            if($this->isPost())
            {
                $userRepository = new UserRepository();
                $cityRepository = new CityRepository();

                //cointainer with actual user

                $actualUser = $this->userRepository->getUserById($_COOKIE['user']);

                //data from post
        
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $email = $_POST['email'];
                $cityName = $_POST['city'];
                $logoLink = $actualUser->getLogoLink();
                if(is_uploaded_file($_FILES['logo']['tmp_name']) && $this->validate($_FILES['logo']))
                {
                    move_uploaded_file(
                        $_FILES['logo']['tmp_name'],
                        dirname(__DIR__) . '/../'. self::PRODUCT_LOGO_DIRECTORY . $_FILES['logo']['name']
                    );
                    unlink(dirname(__DIR__) . '/../'.$actualUser->getLogoLink());
                    $logoLink = self::PRODUCT_LOGO_DIRECTORY . $_FILES['logo']['name'];
                }

                $cityId = $actualUser->getIdCity();
                if($cityName != null)
                {
                    $cityId = $cityRepository->getCityIdByName($cityName);
                }

                if($actualUser->getName() != $name)
                {
                    $actualUser->setName($name);
                }
                if($actualUser->getSurname() != $surname)
                {
                    $actualUser->setSurname($surname);
                }
                if($actualUser->getEmail() != $email)
                {
                    $actualUser->setEmail($email);
                }
                if($cityId != null && $actualUser->getIdCity() != $cityId)
                {
                    $actualUser->setIdCity($cityId);
                }
                if($actualUser->getLogoLink() != $logoLink)
                {
                    $actualUser->setLogoLink($logoLink);
                }
                $userRepository->updateUser($actualUser);
    
            }
            $user = $this->userRepository->getUserById($_COOKIE['user']);
            //var_dump($user);
            $userType = $this->userTypeRepository->getUserTypeById($user->getIdUserType());
            $cities = $this->cityRepository->getCities();
            $userCity = $this->cityRepository->getCityById($user->getIdCity());
            $user->setCityObject($userCity);
            $user->setUserTypeObject($userType);
            if ($this->isMobileDev())
            {
                return $this->render('userSettings',['device' => 'mobile', 'user' => $user, "cities" => $cities]);
            }
            else 
            {
                return $this->render('userSettings',['device' => 'desktop', 'user' => $user, "cities" => $cities]);
            }
        }
        else
        {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dashboard/");
        }

        return $this->render('login');
    }



}