<?php
$pageName = 'Users';

require_once 'config.php';
if(isset($_GET['id'])) {
    $statment = "select * from users where user_id = $_GET[id]";
    $query = mysqli_query($con, $statment);
    $user = mysqli_fetch_assoc($query);
}
if(isset($_POST['user_id'])) {
    $statment = "delete from users where user_id = $_POST[user_id]";
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
      <section class="mb-4 text-center alert-danger">
        <h3>Are you sure you want to delete that user</h3>
        <h2><?= $user['Email'] ?></h2>
        <form method="post">
        <input type="hidden" name="user_id" value="<?= $_GET['id'] ?>">
        <button class="btn btn-outline-danger">Yes</button>
        <a href="allusers.php" class="btn btn-outline-danger">cancel</a>
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

