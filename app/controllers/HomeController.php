<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\App;
use App\Core\Lang;
use App\Services\ProductService;

class HomeController extends Controller
{
    protected $productService;

    public function __construct(?ProductService $productService = null)
    {
        $this->productService = $productService ?? new ProductService();
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();

        $data['title'] = Lang::get('hero_title', 'Zen PHP Framework') . ' - Modern Enterprise Backend';
        $data['products'] = $products;

        App::Layout('main', 'home/index', $data);
    }

    public function about()
    {
        $data['title'] = Lang::get('about_title', 'About Zen PHP');
        App::Layout('main', 'home/about', $data);
    }

    public function switchLang($code)
    {
        Lang::setLocale($code);
        $referer = $_SERVER['HTTP_REFERER'] ?? route('home');
        $this->redirect($referer);
    }
}
