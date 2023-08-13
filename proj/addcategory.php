<?php

require_once 'config.php';
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
                    move_uploaded_file($tmp_name, 'upload/category/' . $imgname);
                } else {
                    echo "exxxxxxxtintion";
                }
            } else {
                echo "size errorrrrrr";
            }
        }
    }
    $sql = "INSERT INTO `categories` (`name`,`image`) VALUES ('$name','$imgname');";
    mysqli_query($con,$sql);
    header('location:allcategories.php');
}
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
              <strong>Add Category</strong>
            </h5>
          </div>
          <div class="card-body">
            <div class="table-responsive container">
              
              <form method="post" enctype="multipart/form-data">
              
                <div class="my-2">
                    <label>Name</label>
                <input name="name" type="text" class="form-control">
                </div>
                <div class="my-2">
                    <label>Image</label>
                <input name="image" type="file" class="form-control">
                </div>
                
              <a href="allcategories.php" ><button type="submit" class='btn btn-primary'>Add</button> </a>
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


