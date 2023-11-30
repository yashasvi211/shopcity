<?php
$conn = mysqli_connect('localhost', 'root', '', 'shopcity');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $user_query = "SELECT * FROM user WHERE user_id = $user_id";
    $user_result = mysqli_query($conn, $user_query);

    if ($user_result) {
        $user_data = mysqli_fetch_assoc($user_result);
        echo "<p>Welcome, " . $user_data['name'] . "!</p>";
    }
}

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $sql = "SELECT * FROM product WHERE product_id = $product_id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);
}


if (isset($_POST['buy'])) {

    $user_id = $_SESSION['user_id'];


    if (isset($_POST['quantity']) && is_numeric($_POST['quantity']) && $_POST['quantity'] > 0) {
        $quantity = $_POST['quantity'];
        $price = $product['price'];
        $total_price = $quantity * $price;


        if ($product['quantity'] >= $quantity) {

            $insert_sql = "INSERT INTO cart (user_id, product_id) VALUES ($user_id, $product_id)";
            mysqli_query($conn, $insert_sql);


            $update_sql = "UPDATE product SET quantity = quantity - $quantity WHERE product_id = $product_id";
            mysqli_query($conn, $update_sql);


            header("Location: exit.php");
            exit();
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $product['title']; ?> - ShopCity
    </title>
    <link rel="stylesheet" href="css/detail.css">

</head>

<body>
    <div>
        <?php

        if (isset($_SESSION['user_id'])) {
            echo "<p>User ID: " . $_SESSION['user_id'] . "</p>";
        } else {
            echo "<p>User ID not available</p>";
        }
        ?>
    </div>

    <div class="product-details">
        <img src="<?= $product["image"]; ?>" alt="Product image" style="max-width: 300px;">
        <h2>
            <?= $product["title"]; ?>
        </h2>
        <p>Price: ₹
            <?= $product["price"]; ?>
        </p>
        <p>Quantity Available:
            <?php
            if ($product['quantity'] > 0) {
                echo $product['quantity'];
            } else {
                echo "Out of stock";
            }
            ?>
        </p>


        <form method="post">
            <label for="quantity">Quantity:</label>
            <select name="quantity" id="quantity">
                <?php

                for ($i = 1; $i <= $product['quantity']; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>


            <?php
            if ($product['quantity'] > 0) {

                echo '<button type="submit" name="buy">Buy Now</button>';
            } else {

                echo '<button type="button" disabled>Out of Stock</button>';
            }
            ?>
        </form>
    </div>


</body>

</html>