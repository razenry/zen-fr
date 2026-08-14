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
        $data['title'] = Lang::get('hero_title', 'Zen PHP Framework') . ' - Starter Kit';
        $data['user'] = ['name' => 'Developer'];

        // Automatically render React 18 SPA Dashboard if React preset is active
        if (file_exists(dirname(__DIR__, 2) . '/resources/js/Pages/Dashboard.jsx')) {
            App::React('Pages/Dashboard', $data);
            return;
        }

        $products = $this->productService->getAllProducts();
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
