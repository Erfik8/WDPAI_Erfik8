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


    private function isMobileDev(){
        if(!empty($_SERVER['HTTP_USER_AGENT'])){
           $user_ag = $_SERVER['HTTP_USER_AGENT'];
           if(preg_match('/(Mobile|Android|Tablet|GoBrowser|[0-9]x[0-9]*|uZardWeb\/|Mini|Doris\/|Skyfire\/|iPhone|Fennec\/|Maemo|Iris\/|CLDC\-|Mobi\/)/uis',$user_ag)){
              return true;
           };
        };
        return false;
    }
}