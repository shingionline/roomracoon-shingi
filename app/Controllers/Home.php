<?php

namespace App\Controllers;

use Core\View;
use App\Models\Product;
use Core\Controller;

class Home extends Controller
{
    public function indexAction()
    {
        $products = Product::getAll();
        View::renderTemplate('home.html', compact('products'));
    }

}