<?php

include 'config.php';

$productname = $_POST['product_name'];
$productprice = $_POST['product_price'];
$productimage = $_FILES['product_image']['name'];
$productimage_tmp = $_FILES['product_image']['tmp_name'];
$productimg_folder = "uploaded/".$productimage;

if(empty($productname) || empty($productprice) || empty($productimage)) {
    $message[] =  "Please fill out all the information";
} else {
    $update = "Update products set name='$productname',price='$productprice',image='$productimage'";
    $query = mysqli_query($conn,$update);
    if($query) {
        move_uploaded_file($productimage_tmp,$productimg_folder);
        $message[] = "Product updated successfully";
    } else {
        $message[] = "Could not update product";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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