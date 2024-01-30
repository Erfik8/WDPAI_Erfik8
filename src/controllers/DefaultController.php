<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        if(isset($_COOKIE['user']))
        {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dashboard/");
            $this->dashboard();   
        }
        else
        {
            $this->render('login');
        }
    }
}