<?php

namespace App\Controllers;

use Core\View;
use App\Models\Cart as CartModel;
use Core\Controller;

class Cart extends Controller
{
    public function indexAction()
    {
        $numberOfItems = CartModel::countItems();
        View::renderTemplate('cart.html', compact('numberOfItems'));
    }

    public function addProductAction()
    {
        $id = $this->route_params['id'];

        try {
            $product = CartModel::addProduct($id);
            View::renderTemplate('addProduct.html', compact('id', 'product'));
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

    }

}