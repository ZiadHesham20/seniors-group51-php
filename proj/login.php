<?php
session_start();


require_once 'config.php';
$adminflag = false;
$query = mysqli_query($con,'select * from users');
while ($user = mysqli_fetch_assoc($query)) {
    if ($user['is_admin'] == 'admin') {
      $adminflag = true;
    }
    
  }
  if($adminflag == false){
    $query = mysqli_query($con,"insert into users (Email,Password,is_admin) values ('Admin@gmail.com','Admin12345','admin')");

  }

  
$flag = 0 ;
$redirectflag = 0;
$all_errors = [];
if(isset($_POST['email'])) {

  $password = $_POST['password'] ;
  $email    = $_POST['email'] ;

  if(! empty($password)) {
      if(strlen($password) > 8) {
          if(preg_match('@[A-Z]@', $password)) {
              $flag++ ;
          } else {
              $all_errors['passRegx'] = 'Password must include capital letter';
          }
      } else {
          $all_errors['passlen'] = 'Password must be more than 8 characters';
      }
  } else {
      $all_errors['passf'] = 'Enter your password';
  }
  if(! empty($email)) {
     
          if(preg_match('/.com$/', $email)) {
              $flag++;
          } else {
              $all_errors['emailRegx'] = 'Email must end with .com';
          }
      } 
   else {
      $all_errors['emailf'] = 'Enter your email';
  }




  if($flag == 2) {
    $sql = "select Email , Password,user_id from users";

    
    $result = mysqli_query($con,$sql);  
    while ($user = mysqli_fetch_assoc($result)) {
      if ($user['Email'] == $email && $user['Password'] == $password) {
         $redirectflag = 1;
         $_SESSION['Email'] = $email;
         $_SESSION['userID'] = $user['user_id'];
     
        
      }
    }  
   
  }
  if($redirectflag == 1){
    if ($_SESSION['Email'] == 'Admin@gmail.com') {
      
        header('location:dashboard.php');
    }else{
      
        header('location:index.php');
    }
  }else{

    $all_errors['notFound'] = "User is not found";

  }
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>


<section class="vh-100 d-flex justify-content-center align-items-center">
  <div class="container-fluid ">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="./images/undraw_login_re_4vu2.svg"
          class="w-100" alt="Sample image">
      </div>
      <div class="col-md-8 shadow-lg p-5 rounded-4 col-lg-6 col-xl-4 offset-xl-1">
        <h1>Login</h1>
        <form method="post">
          
        <?php if(! empty($all_errors)):?>
<?php foreach($all_errors as $error):?>
    <h5 class="alert alert-danger"><?= $error?></h5><br>
    <?php endforeach?>
    <?php endif?>
          <!-- Email input -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Email address</label>
            <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" required/>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
          <label class="form-label" for="form3Example4">Password</label>
            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" required/>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="./register.php"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>

</section>
<script src="./JS/bootstrap.bundle.min.js"></script>
</body>
</html>