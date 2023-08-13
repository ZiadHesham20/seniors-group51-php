<?php
session_start();
if(isset($_SESSION['Email']) && $_SESSION['Email'] != 'Admin@gmail.com'){
  header('location:index.php');
}
require_once 'config.php';
$sql = "SELECT * FROM `users`";

$result = mysqli_query($con,$sql);
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
              <strong>Users</strong>
            </h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th scope="col">User id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Age</th>
                    <th scope="col">Password</th>
                    <th scope="col">Role</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($user = mysqli_fetch_assoc($result)):?>
                    <tr>
                    <th scope="row"><?= $user['user_id']?></th>
                    <td><?= $user['First Name']?></td>
                    <td><?= $user['Last Name']?></td>
                    <td><?= $user['Email']?></td>
                    <td><?= $user['Age']?></td>
                    <td><?= $user['Password']?></td>
                    <td><?= $user['is_admin']?></td>
                    <td><a href="edituser.php?id=<?= $user['user_id'] ?>"><button class='btn btn-success'> Edit </button></a>
                    <a href="deleteuser.php?id=<?= $user['user_id'] ?>"><button class='btn btn-danger'> Delete </button></a></td>
                  </tr>
                    <?php endwhile ?>
                </tbody>
              </table>
              <a href="adduser.php" class='btn btn-primary'>Add user</a>
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

