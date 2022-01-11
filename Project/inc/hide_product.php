<?php
require_once "CProducts.php";

echo json_encode(CProducts::setHidden($_POST['id'], 1));
