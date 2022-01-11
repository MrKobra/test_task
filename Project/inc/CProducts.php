<?php
require_once "DataBase.php";

class CProducts
{
    public static function getProducts($count = null, $orderby = "id", $order = "ASC") {
        $db = new DataBase();
        $query = "SELECT * FROM products WHERE hidden IS NULL or hidden = 0 ORDER BY ".$orderby." ".$order;
        if($count) {
            $query .= " LIMIT ".$count;
        }
        $products = $db->getRows($query);
        unset($db);
        return $products;
    }

    public static function setHidden($id, $hide) {
        $db = new DataBase();
        $query = "UPDATE products SET hidden = ".$hide." WHERE id = ".$id;
        $res = $db->query($query);
        unset($db);
        return $res;
    }

    public static function updateQuantity($id, $count) {
        $db = new DataBase();
        $query = "UPDATE products SET product_quantity = ".$count." WHERE id = ".$id;
        $res = $db->query($query);
        unset($db);
        return $res;
    }
}