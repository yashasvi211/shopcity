<?php
$con = mysqli_connect('localhost', 'root', '', 'shopcity');


if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
session_start();
$sql = "SELECT * FROM product";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <!-- MDB CsS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
  <link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
  <link rel="stylesheet" href="css/styles.css" />


  <title>ShopCity</title>
</head>
<style>
  /* #admin {
        margin-left: 10px;
      } */
</style>

<body>
  <nav class="navbar">
    <div class="navbar-center">
      <h1 id="logo">ShopCity</h1>
      <div class="container">
        <div class="row height d-flex justify-content-center align-items-center">
          <div class="col-md-8">
            <div class="search">
              <i class="fa fa-search"></i>
              <input type="text" class="form-control" placeholder="Search Any Item">
              <button class="btn btn-primary">
                <span id="textforsearch">Search</span>
              </button>

            </div>

          </div>
        </div>
      </div>
      <div class="cart-btn">
        <span class="nav-icon">
          <img src="cart_3433797.png" alt="" srcset="" style="height: 2.2rem" />
        </span>
        <div class="cart-items">0</div>
      </div>
    </div>
    <!-- <a id="admin" href="admin/admin.html"><span id="admin">Admin</span></a> -->
    <!-- <button id="admin" onclick="toadmin()><Span id=" admin">Admin</Span></button> -->
  </nav>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="images/sliders/s0.jpg" alt="First slide" />
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/sliders/s1.1.jpg" alt="Second slide" />
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/sliders/s4.jpg" alt="Third slide" />
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <section class="products">
    <div class="section-title">
      <h2>Best of Our Products</h2>
    </div>
    <div class="products-center" id="products-center">
      <?php
      while ($product = mysqli_fetch_assoc($result)) {
        ?>
        <article class="product" id="thisistheway">
          <div class="img-container">
            <a href="detail.php?product_id=<?= $product["product_id"]; ?>">
              <img src="<?= $product["image"]; ?>" alt="Product image" class="product-img">
            </a>
            <!-- <button class="bag-btn" data-id="<?= $product["product_id"]; ?>">
                <i class="fas fa-shopping-cart"></i> add to cart
              </button> -->
          </div>

          <h3 class="product-title">
            <?= $product["title"]; ?>
          </h3>
          <h4 class="product-price">₹
            <?= $product["price"]; ?>
          </h4>
        </article>
        <?php
      }
      ?>

    </div>
  </section>


  <div class="cart-overlay">
    <div class="cart">
      <span class="close-cart">
        <i class="fas fa-window-close"></i>
      </span>
      <h2>your cart</h2>
      <div class="cart-content">

      </div>
      <div class="cart-footer">
        <h3>your total:₹<span class="cart-total">0</span></h3>
        <button class="clear-cart banner-btn">clear cart</button>
      </div>
    </div>
  </div>
  <script>
    function toadmin() {
      window.location.href = 'admin/admin.html';
    }
  </script>
  <script src="js/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
  <script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>

</body>

</html>