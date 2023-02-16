<?php
namespace App\Models;

use PDO;
use Core\Model;

/**
 * Post model
 *
 * PHP version 7.0
 */

class Cart extends Model
{
    /**
     * Get all the products as an associative array
     *
     * @return array
     */
    public static function addProduct($id)
    {
        try {

            $db = static::getDB();
            $sql = "INSERT INTO cart (product_id) VALUES (:product_id)";
            $stmt = $db->prepare($sql);
            $stmt->execute(['product_id' => $id]);

        } catch (\PDOException $e) {
            echo $e->getMessage();
            die;
        }

        // return the product
        return Product::getProductById($id);
    }

    /**
     * Get all products from cart
     */
    public static function countItems()
    {
        try {

            $db = static::getDB();
            $sql = "SELECT * FROM cart";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $count = $stmt->rowCount();

            return $count;

        } catch (\PDOException $e) {
            echo $e->getMessage();
            die;
        }
    }

    
}