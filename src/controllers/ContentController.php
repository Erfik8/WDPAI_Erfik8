<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/ProductRepository.php';
require_once __DIR__.'/../repository/ShopRepository.php';


class ContentController extends AppController {

    private $message = [];
    private $productRepository;
    private $shopRepository;

    public function __construct()
    {
        parent::__construct();
        $this->productRepository = new ProductRepository();
        $this->shopRepository = new ShopRepository();
    }
    
    public function dashboard()
    {
        if($this->isMobileDev())
        {
            $this->render('dashboard',['device' => 'mobile']);
        }
        else
        {
            $products = [];
            if($this->isGet())
            {
                $phrase = '';
                if(isset($_GET['phrase']))
                {
                    $phrase = $_GET['phrase'];
                }
                $offset = 0;
                if(isset($_GET['offset']))
                {
                    $offset = $_GET['offset'];
                }
                $products = $this->productRepository->getProductsByPhrase($phrase,$offset);
                if($products == null)
                {
                    $products = [];
                }
            }
            $shops = [];
            if($this->isGet())
            {
                $city_id = 1;
                if(isset($_GET['city_id']))
                {
                    $city_id = $_GET['city_id'];
                }
                $offset = 0;
                if(isset($_GET['offset']))
                {
                    $offset = $_GET['offset'];
                }
                $shops = $this->shopRepository->getShopsByCityId($city_id,$offset);
                if($products == null)
                {
                    $products = [];
                }
            }
            $this->render('dashboard',['device' => 'desktop', 'products' => $products, 'shops' => $shops]);
        }
    }
    
    public function products()
    {
        if($this->isMobileDev())
        {
            $this->render('productInformation',['device' => 'mobile']);
        }
        else
        {
            $products = [];
            if($this->isGet())
            {
                $phrase = '';
                if(isset($_GET['phrase']))
                {
                    $phrase = $_GET['phrase'];
                }
                $offset = 0;
                if(isset($_GET['offset']))
                {
                    $offset = $_GET['offset'];
                }
                $products = $this->productRepository->getProductsByPhrase($phrase,$offset);
                if($products == null)
                {
                    $products = [];
                }
            }
            $this->render('productInformation',['device' => 'desktop','products' => $products]);
        }
    }

    public function shops()
    {
        if($this->isMobileDev())
        {
            $this->render('shopInformation',['device' => 'mobile']);
        }
        else
        {
            $this->render('shopInformation',['device' => 'desktop']);
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