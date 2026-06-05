<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\App;

class HomeController extends Controller
{
    public function index()
    {
        
        $data['title'] = 'Home Feed';

        App::Layout('main', 'home/index', $data);
    }

    public function about()
    {
        $data['title'] = 'About Us';
        App::Layout('main', 'home/about', $data);
    }
}
