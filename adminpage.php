<?php

include 'config.php';

if(isset($_POST['add_product'])) {
    $productname = $_POST['product_name'];
    $productprice = $_POST['product_price'];
    $productimage = $_FILES['product_image']['name'];
    $productimage_tmpname = $_FILES['product_image']['tmp_name'];
    $productimage_folder = 'uploaded/'.$productimage;

    if(empty($productname) || empty($productprice) || empty($productimage)) {
        $message[] = 'Please fill in the information';
    } else {
        $insert = "INSERT INTO products(name, price, image) VALUES('$productname', '$productprice', '$productimage')";
        $upload = mysqli_query($conn,$insert);
        if($upload) {
            move_uploaded_file($productimage_tmpname,$productimage_folder);
            $message[] = 'New product added sucessfully';
        } else {
            $message[] = 'could not add product';
        }
    }
    
}

if(isset($_GET['delete'])) {
    $id = $_get['delete'];
    $delete = "DELETE FROM products WHERE id = '$id'";
    $result = mysqli_query($conn,$delete);
    header('location:adminpage.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if(isset($message)) {
            foreach ($message as $message) {
                echo '<span class="message">'.$message.'</span>';
            }
        }
    ?>
    <div class="container">
        <div class="admin-product-form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <h3>Add new product</h3>
                <input type="text" placeholder="Enter product name" name="product_name" class="box">
                <input type="number" placeholder="Enter product price" name="product_price" class="box">
                <input type="file" accept="image/png, image/jgp" name="product_image" class="box">
                <input type="submit" class="btn" name="add_product" value="add a product">
            </form>
        </div>
        <?php
            $select = mysqli_query($conn,"Select * from products");
        ?>
        <div class="product-display">
            <table class="product-table">
                <thead>
                    <tr>
                        <th>Product image</th>
                        <th>Product name</th>
                        <th>Product price</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php
                    while($row= mysqli_fetch_assoc($select)) {
                ?>
                <tr>
                        <td><img src="uploaded/<?php echo $row['image']; ?>" height="100px"></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td>
                            <a href="adminpage.php?edit=<?php echo $row['id']; ?>" class="btn">Edit</a>
                            <a href="adminpage.php?delete=<?php echo $row['id']; ?>" class="btn">Delete</a>
                        </td>
                    </tr>
                <?php }; ?>
            </table>
        </div>
    </div>
</body>
</html>