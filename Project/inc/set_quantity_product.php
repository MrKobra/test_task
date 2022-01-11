<?php
require_once "CProducts.php";

echo json_encode(CProducts::updateQuantity($_POST['id'], $_POST['count']));