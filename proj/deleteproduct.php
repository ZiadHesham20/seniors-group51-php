<?php
$pageName = 'product';

require_once 'config.php';
if(isset($_GET['id'])) {
    $statment = "select * from products where id = $_GET[id]";
    $query = mysqli_query($con, $statment);
    $product = mysqli_fetch_assoc($query);
}
if(isset($_POST['id'])) {
    $statment = "delete from products where id = $_POST[id]";
    mysqli_query($con, $statment);
    header('location:allproducts.php');
}

?>
<body>
  <!--Main Navigation-->
  <?php
  include 'dashHeader.php'
  ?>
  <!--Main layout-->
  <main style="margin-top: 58px">
    <div class="container pt-4">
    <!--Section: Sales Performance KPIs-->
      <section class="mb-4 text-center alert-danger">
        <h3>Are you sure you want to delete that category</h3>
        <img class="w-25 rounded-pill mb-2" src="upload/product/<?=$product['image']?>" alt="" srcset="">
        <form method="post">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <button class="btn btn-outline-danger">Yes</button>
        <a href="allproducts.php" class="btn btn-outline-danger">cancel</a>
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

