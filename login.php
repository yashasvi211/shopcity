<?php
$conn = mysqli_connect('localhost', 'root', '', 'shopcity');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// process login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // retrieve user data from the database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            echo "Login successful!";

            // redirect to home.php
            header("Location: home.php");
            exit();
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }
}

// Close connection
$conn->close();
?>