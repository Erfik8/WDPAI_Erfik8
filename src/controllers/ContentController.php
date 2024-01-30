<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/ProductRepository.php';
require_once __DIR__.'/../repository/ShopRepository.php';
require_once __DIR__.'/../repository/CompanyRepository.php';
require_once __DIR__.'/../repository/CategoryRepository.php';


class ContentController extends AppController {

    private $message = [];
    private $productRepository;
    private $shopRepository;
    private $companyRepository;
    private $categoryRepository;
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const PRODUCT_LOGO_DIRECTORY = '/public/images/products/';

    public function __construct()
    {
        parent::__construct();
        $this->productRepository = new ProductRepository();
        $this->shopRepository = new ShopRepository();
        $this->companyRepository = new CompanyRepository();
        $this->categoryRepository = new CategoryRepository();
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
    
    public function products($message = '')
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
            else
            {
                $main_product = $products[0];
            }
        }
        if($this->isMobileDev())
        {
            if(isset($_GET['product_id']))
            {
                $this->render('productDetails',['device' => 'mobile','main_product' => $main_product, 'message' => $message]);
            }
            else 
            {
                $this->render('productInformation',['device' => 'mobile','products' => $products , 'message' => $message]);
            }
        }
        else
        {
            $companyList = $this->companyRepository->getCompanies();
            $categoryList = $this->categoryRepository->getCategories();
            $this->render('productInformation',['device' => 'desktop','products' => $products, 'main_product' => $main_product,'companyList' => $companyList, 'categoryList' => $categoryList, 'message' => $message]);
        }
    }

    public function addProduct()
    {
        $companyList = $this->companyRepository->getCompanies();
        if($this->isPost())
        {
            $name = $_POST['name'];
            $companyName = $_POST['company'];
            $companyId = $this->companyRepository->getCompanyIdByName($companyName); // it can be -1
            if($companyId == -1)
            {
                $this->companyRepository->createCompany($companyName);
                $companyId = $this->companyRepository->getCompanyIdByName($companyName);
            }
            $category = $_POST['category'];
            $categoryId = $this->categoryRepository->getCategoryIdByName($category); // it can be -1
            if($categoryId == -1)
            {
                $this->categoryRepository->createCategory($category);
                $categoryId = $this->categoryRepository->getCategoryIdByName($category);
            }
            $description = $_POST['description'];
            $isVegan = $_POST['isVegan'];
            $isVegetarian = $_POST['isVegetarian'];
            $isGlutenFree = $_POST['isGlutenFree'];
            $isLactoseFree = $_POST['isLactoseFree'];
            $logoLink = "";
            if(is_uploaded_file($_FILES['logo']['tmp_name']) && $this->validate($_FILES['logo']))
            {
                move_uploaded_file(
                    $_FILES['logo']['tmp_name'],
                    dirname(__DIR__) . '/../'. self::PRODUCT_LOGO_DIRECTORY . $_FILES['logo']['name']
                );
                $logoLink = self::PRODUCT_LOGO_DIRECTORY . $_FILES['logo']['name'];
            }
            else{
                if($this->isMobileDev())
                {
                    $this->render('addProduct',['device' => 'mobile','companyList' => $companyList,'message' => "No file uploaded"]);
                }
                else 
                {
                    $this->products("No file uploaded");
                }
            }
            $this->productRepository->createProduct(
                $name,
                intval($categoryId),
                $isGlutenFree,
                $isVegan,
                $isVegetarian,
                $isLactoseFree,
                $description,
                $logoLink,
                intval($companyId));

        }
        if($this->isMobileDev())
        {
            $this->render('addProduct',['device' => 'mobile','companyList' => $companyList, 'message' => "Product Added succesfully!"]);
        }
        else 
        {
            $this->products("Product Added succesfully!");
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