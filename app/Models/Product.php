<?php
namespace App\Models;

use PDO;
use Core\Model;

/**
 * Post model
 *
 * PHP version 7.0
 */

class Product extends Model
{
    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        try {

            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM products ORDER BY id DESC');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Get product by id
     */
    public static function getProductById($id)
    {
        try {

            $db = static::getDB();
            $sql = "SELECT * FROM products WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute(['id' => $id]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            return $product;

        } catch (\PDOException $e) {
            echo $e->getMessage();
            die;
        }
    }

    
}