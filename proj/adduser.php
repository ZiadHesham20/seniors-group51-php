<?php

require_once 'config.php';
if (isset($_POST['first_name'])) {
    $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $age = $_POST['age'];
  $password = $_POST['password'] ;
  $email    = $_POST['email'] ;
  $is_admin = $_POST['is_admin'];
    $sql = "INSERT INTO `users` (`First Name`, `Last Name`, `Email`, `Password`, `Age`,`is_admin`) VALUES ('$first_name','$last_name','$email','$password','$age','$is_admin');";
    mysqli_query($con,$sql);
    header('location:allusers.php');
}
$pageName= 'Users';
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
              <strong>Add User</strong>
            </h5>
          </div>
          <div class="card-body">
            <div class="table-responsive container">
              
              <form method="post">
              <div class="my-2 row">
                    <div class="col-6">
                    <label>First Name</label>
                <input name="first_name" type="text" class="form-control">
                    </div>
                    <div class="col-6">
                    <label>Last Name</label>
                <input name="last_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="my-2">
                    <label>age</label>
                <input name="age" type="number" class="form-control">
                </div>
                <div class="my-2">
                    <label>Email</label>
                <input name="email" type="email" class="form-control">
                </div>
                <div class="my-2">
                    <label>Password</label>
                <input name="password" type="password" class="form-control">
                </div>
                <div class="my-2">
                <div>
                <input name="is_admin" value="admin" type="radio" >
                <label>Admin</label>
                </div>
                <div>
                <input name="is_admin" value="User" type="radio" >
                <label>User</label>
                </div>
                </div>
              <a href="adduser.php" ><button type="submit" class='btn btn-primary'>Add</button> </a>
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


