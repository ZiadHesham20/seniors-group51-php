<?php
session_start();


require_once '../config.php';
$stat = "SELECT * FROM `products` JOIN users_cart on users_cart.product_id = products.id WHERE users_cart.user_id = $_SESSION[userID];";
$result = mysqli_query($con,$stat);
$numOfProducts = mysqli_num_rows($result); 

$gettotal = "SELECT SUM(products.price) AS total_price FROM `products` JOIN users_cart ON users_cart.product_id = products.id WHERE users_cart.user_id = $_SESSION[userID];";
$query = mysqli_query($con,$gettotal);
$total = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="../css/style.css" />
</head>
<!--Main Navigation-->
<body class="position-relative">
<div class="position-absolute top-0 bottom-0 start-0 end-0 " id="payment" style="display: none;z-index: 99999;background-color: rgba(0, 0, 0, 0.5);">
<div class="p-5 mt-5">
<h2 class="text-center text-white">Payment Method</h2>
  <section class="gradient-custom">
  <div class="container  py-5">
    <div class="row d-flex justify-content-center align-items-center py-5">
      <div class="col-md-7 col-lg-5 col-xl-4">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body p-4">
            <div class="d-flex justify-content-end">
            <i onclick="hide()" class="far fa-times-circle pointer"></i>
            </div>
            <form>
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-outline">
                  <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                    placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                  <label class="form-label" for="typeText">Card Number</label>
                </div>
                <img src="https://img.icons8.com/color/48/000000/visa.png" alt="visa" width="64px" />
              </div>

              <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-outline">
                  <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                    placeholder="Cardholder's Name" />
                  <label class="form-label" for="typeName">Cardholder's Name</label>
                </div>
              </div>

              <div class="d-flex justify-content-between align-items-center pb-2">
                <div class="form-outline">
                  <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YYYY"
                    size="7" id="exp" minlength="7" maxlength="7" />
                  <label class="form-label" for="typeExp">Expiration</label>
                </div>
                <div class="form-outline">
                  <input type="password" id="typeText2" class="form-control form-control-lg"
                    placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                  <label class="form-label" for="typeText2">Cvv</label>
                </div>
                <button type="button" class="btn btn-info btn-lg btn-rounded">
                  <i class="fas fa-arrow-right"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</div>  
</div>
  
<header>
  <!-- Jumbotron -->
  <div class="p-3 text-center bg-white border-bottom">
    <div class="container">
      <div class="row justify-content-between gy-3">
        <!-- Left elements -->
        <div class="col-lg-2 col-sm-4 col-4">
          <a href="https://mdbootstrap.com/" target="_blank" class="float-start">
            <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="35" />
          </a>
        </div>
        <!-- Left elements -->

        <!-- Center elements -->
        <div class="order-lg-last col-lg-5 col-sm-8 col-8">
          <div class="d-flex float-end align-items-center">
             <?php if(isset($_SESSION['Email']) && ! empty($_SESSION['Email'])):?>
              
              <a class="text-white btn btn-primary mx-2" href="../logout.php">Logout</a>  
                
              <?php else : ?>
                  
                <a class="text-white btn btn-primary mx-2" href="../login.php">Login</a>  
              
                <?php endif;?> 
            
                <?php if(isset($_SESSION['Email']) && $_SESSION['Email'] == 'Admin@gmail.com'):?>
              
              <a class="text-white btn btn-primary mx-2" href="../dashboard.php">dashboard</a>  
                
              <?php else : ?>
                  
                  
              
                <?php endif;?> 
          </div>
        </div>
        <!-- Center elements -->

        <!-- Right elements -->
       
        <!-- Right elements -->
      </div>
    </div>
  </div>
  <!-- Jumbotron -->

  <!-- Heading -->
  <div class="bg-primary mb-4">
    <div class="container py-4">
      <h1 class="text-white mt-2">Cart</h1>
    </div>
  </div>
  <!-- Heading -->
</header>

<!-- sidebar + content -->
<!-- sidebar + content -->
<section class="h-100 ">
<div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          
          <div>
           
          </div>
        </div>
        <div class="mb-3">
        <a href="../index.php" class="text-black"><i class="fas fa-arrow-left fa-fw "></i>Home</a>
        </div>
        <?php while($item = mysqli_fetch_assoc($result)):?>
            <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img
                  src="../upload/product/<?= $item['image']?>"
                  class="img-fluid rounded-3" alt="Cotton T-shirt">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2"><?= $item['name'] ?></p>
                
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0"><?=$item['price']?> L.E</h5>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="./deletfromCart.php?product_id=<?=$item['product_id']?>&&user_id=<?=$_SESSION['userID']?>&&id=<?= $item['id']?>" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>

        
            <?php endwhile; ?>
        <div class="card mb-4">
          <div class="card-body p-4 d-flex flex-row align-items-center">
            <div class="form-outline flex-fill">
              <input type="text" id="form1" class="form-control form-control-lg" />
              <label class="form-label" for="form1">Total check</label>
            </div>
            <h3><?= $total['total_price']?> L.E</h3>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <button type="button" onclick="appear()" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="text-center text-lg-start text-muted bg-primary mt-3">
  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start pt-4 pb-4">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-12 col-lg-3 col-sm-12 mb-2">
          <!-- Content -->
          <a href="https://mdbootstrap.com/" target="_blank" class="text-white h2">
            MDB
          </a>
          <p class="mt-1 text-white">
            © 2023 Copyright: MDBootstrap.com
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-6 col-sm-4 col-lg-2">
          <!-- Links -->
          <h6 class="text-uppercase text-white fw-bold mb-2">
            Store
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-white-50" href="#">About us</a></li>
            <li><a class="text-white-50" href="#">Find store</a></li>
            <li><a class="text-white-50" href="#">Categories</a></li>
            <li><a class="text-white-50" href="#">Blogs</a></li>
          </ul>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-6 col-sm-4 col-lg-2">
          <!-- Links -->
          <h6 class="text-uppercase text-white fw-bold mb-2">
            Information
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-white-50" href="#">Help center</a></li>
            <li><a class="text-white-50" href="#">Money refund</a></li>
            <li><a class="text-white-50" href="#">Shipping info</a></li>
            <li><a class="text-white-50" href="#">Refunds</a></li>
          </ul>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-6 col-sm-4 col-lg-2">
          <!-- Links -->
          <h6 class="text-uppercase text-white fw-bold mb-2">
            Support
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-white-50" href="#">Help center</a></li>
            <li><a class="text-white-50" href="#">Documents</a></li>
            <li><a class="text-white-50" href="#">Account restore</a></li>
            <li><a class="text-white-50" href="#">My orders</a></li>
          </ul>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-12 col-sm-12 col-lg-3">
          <!-- Links -->
          <h6 class="text-uppercase text-white fw-bold mb-2">Newsletter</h6>
          <p class="text-white">Stay in touch with latest updates about our products and offers</p>
          <div class="input-group mb-3">
            <input type="email" class="form-control border" placeholder="Email" aria-label="Email" aria-describedby="button-addon2" />
            <button class="btn btn-light border shadow-0" type="button" id="button-addon2" data-mdb-ripple-color="dark">
              Join
            </button>
          </div>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <div class="">
    <div class="container">
      <div class="d-flex justify-content-between py-4 border-top">
        <!--- payment --->
        <div>
          <i class="fab fa-lg fa-cc-visa text-white"></i>
          <i class="fab fa-lg fa-cc-amex text-white"></i>
          <i class="fab fa-lg fa-cc-mastercard text-white"></i>
          <i class="fab fa-lg fa-cc-paypal text-white"></i>
        </div>
        <!--- payment --->

        <!--- language selector --->
        <div class="dropdown dropup">
          <a class="dropdown-toggle text-white" href="#" id="Dropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false"> <i class="flag-united-kingdom flag m-0 me-1"></i>English </a>

          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="Dropdown">
            <li>
              <a class="dropdown-item" href="#"><i class="flag-united-kingdom flag"></i>English <i class="fa fa-check text-success ms-2"></i></a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-poland flag"></i>Polski</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-china flag"></i>中文</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-japan flag"></i>日本語</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-germany flag"></i>Deutsch</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-france flag"></i>Français</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-spain flag"></i>Español</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-russia flag"></i>Русский</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-portugal flag"></i>Português</a>
            </li>
          </ul>
        </div>
        <!--- language selector --->
      </div>
    </div>
  </div>
</footer>
<!-- Footer -->
</body>
<script>
function appear() {
  window.scroll(0,0)
  let x = document.getElementById('payment').style.display = 'block';
}
function hide() {
  let x = document.getElementById('payment').style.display = 'none';
}
</script>
</html>