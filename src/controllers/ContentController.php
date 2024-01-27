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
        $products = [];
        $phrase = '';
        $main_product = null;
        if($this->isGet())
        {
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
            if(isset($_GET['product_id']))
            {
                $main_product = $this->productRepository->getProductById(intval($_GET['product_id']));
            }
        }
        if($this->isMobileDev())
        {
            if(isset($_GET['product_id']))
            {
                $this->render('productDetails',['device' => 'mobile','main_product' => $main_product]);
            }
            else 
            {
                $this->render('productInformation',['device' => 'mobile','products' => $products]);
            }
        }
        else
        {

            $this->render('productInformation',['device' => 'desktop','products' => $products, 'main_product' => $main_product]);
        }
    }

    public function shops()
    {
        $shops = [];
        $phrase = '';
        $main_shop = null;
        if($this->isGet())
        {
            if(isset($_GET['phrase']))
            {
                $phrase = $_GET['phrase'];
            }
            $offset = 0;
            if(isset($_GET['offset']))
            {
                $offset = $_GET['offset'];
            }
            $shops = $this->shopRepository->getShopsByPhrase($phrase,$offset);
            if($shops == null)
            {
                $shops = [];
            }
            if(isset($_GET['shop_id']))
            {
                $main_shop = $this->shopRepository->getShopById(intval($_GET['shop_id']));
            }
            else
            {
                $main_shop = $shops[0];
            }
        }
        if($this->isMobileDev())
        {
            if(isset($_GET['shop_id']))
            {
                $this->render('shopDetails',['device' => 'mobile','main_shop' => $main_shop]);
            }
            else 
            {
                $this->render('shopInformation',['device' => 'mobile','shops' => $shops]);
            }
        }
        else
        {
            $this->render('shopInformation',['device' => 'desktop','shops' => $shops, 'main_shop' => $main_shop]);
        }
    }

    public function getProducts()
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
            $this->render('common/productSearch',['products' => $products]);
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