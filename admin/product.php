<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image = $_POST["image"];
    $price = $_POST["price"];
    $title = $_POST["title"];
    $seller_id = $_POST["seller_id"];
    $quantity = $_POST["quantity"];

    $con = mysqli_connect('localhost', 'root', '', 'shopcity');

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $sql = "INSERT INTO product (image, price, title, seller_id, quantity) VALUES ('$image', $price, '$title', $seller_id, $quantity)";

    if (mysqli_query($con, $sql)) {
        echo "Product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}
?>