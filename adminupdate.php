<?php

include 'config.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="admin-product-form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <h3>Update product</h3>
                <input type="text" placeholder="Enter product name" name="product_name" class="box">
                <input type="number" placeholder="Enter product price" name="product_price" class="box">
                <input type="file" accept="image/png, image/jgp" name="product_image" class="box">
                <input type="submit" class="btn" name="add_product" value="add a product">
            </form>
        </div>
    </div>
</body>
</html>