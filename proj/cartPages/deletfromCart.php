<?php
session_start();
$pageName = 'product';

require_once '../config.php';
if(isset($_GET['product_id'])) {
    $statment = "SELECT * FROM `products` JOIN users_cart on users_cart.product_id = products.id WHERE users_cart.user_id = $_SESSION[userID] && products.id = $_GET[product_id]";
    $query = mysqli_query($con, $statment);
    $product = mysqli_fetch_assoc($query);
}
if(isset($_POST['id'])) {
    $statment = "DELETE FROM `users_cart` WHERE `product_id` = $_POST[id] && `user_id` = $_SESSION[userID] && `id` = $_GET[id]";
    mysqli_query($con, $statment);
    header('location:addtoCart.php');
}

?>
<body>
  <!--Main Navigation-->
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

  <!--Main layout-->
  <main style="margin-top: 58px">
    <div class="container pt-4">
    <!--Section: Sales Performance KPIs-->
      <section class="mb-4 text-center alert-danger">
        <h3>Are you sure you want to delete that category</h3>
        <img class="w-25 rounded-pill mb-2" src="../upload/product/<?=$product['image']?>" alt="" srcset="">
        <form method="post">
        <input type="hidden" name="id" value="<?= $_GET['product_id'] ?>">
        <button class="btn btn-outline-danger">Yes</button>
        <a href="addtoCart.php" class="btn btn-outline-danger">cancel</a>
        </form>
        </section>
      <!--Section: Sales Performance KPIs-->
    </div>
  </main>
  <!--Main layout-->
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="js/admin.js"></script>

</body>

