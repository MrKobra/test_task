<?php
require_once "inc/CProducts.php";
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Тестовое задание</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php
    $products = CProducts::getProducts(5, "date_create", "DESC");
    if($products):
    ?>

    <div class="products">
        <div class="container">
            <p class="notice"></p>
            <div class="products-table">
                <ul class="products-table_heading">
                    <li>ID</li>
                    <li>PRODUCT_ID</li>
                    <li>PRODUCT_NAME</li>
                    <li>PRODUCT_PRICE</li>
                    <li>PRODUCT_ARTICLE</li>
                    <li>PRODUCT_QUANTITY</li>
                    <li>DATE_CREATE</li>
                    <li>HIDDEN</li>
                </ul>
                <?php
                foreach($products as $product) {
                    ?>
                    <ul data-id="<?php echo $product['id']; ?>">
                        <li><?php echo $product['id']; ?></li>
                        <li><?php echo $product['product_id']; ?></li>
                        <li><?php echo $product['product_name']; ?></li>
                        <li><?php echo $product['product_price']; ?></li>
                        <li><?php echo $product['product_article']; ?></li>
                        <li class="products-quantity">
                            <a href="#" class="minus">-</a>
                           <span class="quantity" data-quantity="<?php echo $product['product_quantity']; ?>"> <?php echo $product['product_quantity']; ?></span>
                            <a href="#" class="plus">+</a>
                        </li>
                        <li><?php echo $product['date_create']; ?></li>
                        <li><a href="#" class="hidden_btn">Скрыть</a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
