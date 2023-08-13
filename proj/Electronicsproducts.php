<?php
session_start();
if(isset($_SESSION['Email']) && $_SESSION['Email'] != 'Admin@gmail.com'){
  header('location:index.php');
}
require_once 'config.php';
$stat = "SELECT  * ,products.id as proID,products.name as proName,products.image as proImage, categories.name as catName FROM `products` join categories on products.category_id = categories.id WHERE category_id = '2'";
$result = mysqli_query($con,$stat);
$pageName= 'Categories';
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
      <section class="mb-4">
        <div class="card">
          <div class="card-header text-center py-3">
            <h5 class="mb-0 text-center">
              <strong>Electronics</strong>
            </h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Color</th>
                    <th scope="col">Category</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($product = mysqli_fetch_assoc($result)):?>
                    <tr>
                    <th scope="row"><?= $product['proID']?></th>
                    <td><?= $product['proName']?></td>
                    <td><img src="upload/product/<?= $product['proImage']?>" class="w-25 rounded-pill" alt="" srcset=""></td>
                    <td><?= $product['price']?> L.E</td>
                    <td><?= $product['color']?></td>
                    <td><?= $product['catName']?></td>
                    <td><a href="editproduct.php?id=<?= $product['proID'] ?>"><button class='btn btn-success'> Edit </button></a>
                    <a href="deleteproduct.php?id=<?= $product['proID'] ?>"><button class='btn btn-danger'> Delete </button></a></td>
                  </tr>
                    <?php endwhile ?>
                </tbody>
              </table>
              <a href="addproduct.php" class='btn btn-primary'>Add</a>
            </div>
          </div>
        </div>
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

