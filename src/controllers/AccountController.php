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

            }
            else 
            {
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
        }
        else
        {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dashboard/");
        }

        return $this->render('login');
    }
    
    public function products($message = '')
    {

    }


    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}