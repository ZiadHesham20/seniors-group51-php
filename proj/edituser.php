<?php
$pageName = 'Users';

require_once 'config.php';
if(isset($_GET['id'])) {
    $statment = "select * from users where user_id = $_GET[id]";
    $query = mysqli_query($con, $statment);
    $user = mysqli_fetch_assoc($query);
}
if(isset($_POST['email'])) {

    $statment = "update users set `First Name`='$_POST[first_name]', `Last Name`='$_POST[last_name]', `Email`='$_POST[email]' , `Password`='$_POST[password]' ,`Age`='$_POST[age]', `is_admin`='$_POST[is_admin]' where  user_id = $_GET[id]";
    mysqli_query($con, $statment);
    header('location:allusers.php');
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
              <strong>Edit User</strong>
            </h5>
          </div>
          <div class="card-body">
            <div class="table-responsive container">
              
              <form method="post">
              <div class="my-2 row">
                    <div class="col-6">
                    <label>First Name</label>
                <input name="first_name" type="text" value="<?= $user['First Name'] ?>" class="form-control">
                    </div>
                    <div class="col-6">
                    <label>Last Name</label>
                <input name="last_name" type="text" value="<?= $user['Last Name'] ?>" class="form-control">
                    </div>
                </div>
                <div class="my-2">
                    <label>age</label>
                <input name="age" type="number" value="<?= $user['Age'] ?>" class="form-control">
                </div>
                <div class="my-2">
                    <label>Email</label>
                <input name="email" type="email" value="<?= $user['Email'] ?>" class="form-control">
                </div>
                <div class="my-2">
                    <label>Password</label>
                <input name="password" type="password" value="<?= $user['Password']?>" class="form-control">
                </div>
                <div class="my-2">
                <div>
                <input name="is_admin" <?= $user['is_admin'] ==  'admin' ? 'checked' : ' ' ?> value="admin" type="radio" >
                <label>Admin</label>
                </div>
                <div>
                <input name="is_admin" <?= $user['is_admin'] ==  'User' ? 'checked' : ' ' ?> value="User" type="radio" >
                <label>User</label>
                </div>
                </div>
              <a href="allusers.php" ><button type="submit" class='btn btn-primary'>Update</button> </a>
              <a href="allusers.php" class="btn  btn-outline-danger">cancel</a>
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


