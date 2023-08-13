<?php
$pageName= 'products';
require_once 'config.php';
$allCat = "SELECT * FROM `categories`";
$result = mysqli_query($con,$allCat);

if(isset($_GET['id'])) {
    $statment = "SELECT * FROM `products`where id = $_GET[id]";
    $query = mysqli_query($con, $statment);
    $product = mysqli_fetch_assoc($query);
}
if (isset($_POST['name'])) {
    $name = $_POST['name'];

    $myimg = $_FILES['image'] ;
    $ext = ['jpg' , 'png' , 'jpeg'];

    $tmp_name = $myimg['tmp_name'];
    $img_erro = $myimg['error'];
    $img_size = $myimg['size'];// byte  / 1024 / 1024
    $imgname = uniqid() . $myimg['name'];
    $expload = explode('.', $imgname); //array
    $end_of  = end($expload);
    $final_ext = strtolower($end_of);


    if(isset($_FILES['image'])) {
        if($img_erro != 4) {
            if($img_size < 11027175) {
                if(in_array($final_ext, $ext)) {
                    unlink('upload/product'. $product['image']);
                    move_uploaded_file($tmp_name, 'upload/product/' . $imgname);
                } else {
                    echo "exxxxxxxtintion";
                }
            } else {
                echo "size errorrrrrr";
            }
        }
    }
    $statment = "update products set `name`='$name', `image` = '$imgname' where  id = $_GET[id]";
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
      <section class="mb-4">
        <div class="card">
          <div class="card-header text-center py-3">
            <h5 class="mb-0 text-center">
              <strong>Edit Product</strong>
            </h5>
          </div>
          <div class="card-body">
            <div class="table-responsive container">
            <form method="post" enctype="multipart/form-data">
              
              <div class="my-2">
                  <label>Name</label>
              <input name="name"  value="<?= $product['name']?>" type="text" class="form-control">
              </div>
              <div class="my-2">
                  <label>Price</label>
              <input name="price" value="<?= $product['price']?>" type="text" class="form-control">
              </div>
              
              <div class="my-2">
                    <label>Category</label>
                    <select name="category_id" id=""  class="form-control">
                      <?php while($cat = mysqli_fetch_assoc($result)) :?>
                    <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                      <?php endwhile; ?>
                    </select>
                </div>
              <div class="my-2">
                  <label>Image</label>
              <input name="image" type="file" class="form-control" required>
              </div>
              <div class="my-2">
                  <label>Color</label>
              <input name="color" value="<?= $product['color']?>" type="color" class="form-control w-25">
              </div>
            <a href="allproducts.php" ><button type="submit" class='btn btn-primary'>Add</button> </a>
            <a href="allproducts.php" class="btn  btn-outline-danger">cancel</a>
            </form>
          
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


