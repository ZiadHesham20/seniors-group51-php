<?php
require_once 'config.php';
$flag = 0 ;
$all_errors = [];
if(isset($_POST['first_name'])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $age = $_POST['age'];
  $password = $_POST['password'] ;
  $email    = $_POST['email'] ;



 

  

  if(! empty($first_name)) {
          if(preg_match('/^[A-Za-z]+$/', $first_name)) {
              $flag++ ;
          } else {
              $all_errors['firstNameRegx'] = 'Enter letters only';
          }
      }
   else {
      $all_errors['firstnamef'] = 'Enter your first name';
  }

  if(! empty($last_name)) {
    if(preg_match('/^[A-Za-z]+$/', $last_name)) {
        $flag++ ;
    } else {
        $all_errors['lastNameRegx'] = 'Enter letters only';
    }
  }
 else {
$all_errors['lastnamef'] = 'Enter your last name';
}

if(! empty($age)) {
  if($age > 10) {
      $flag++ ;
  } else {
      $all_errors['agelimit'] = 'Your age must be greater than 10';
  }
}
else {
$all_errors['lastnamef'] = 'Enter your last name';
}


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


  // foreach($users as $user) {
  // }


  if($flag == 5) {
   
    $sql = "INSERT INTO `users` (`First Name`, `Last Name`, `Email`, `Password`, `Age`) VALUES ('$first_name','$last_name','$email','$password','$age');";
    mysqli_query($con,$sql);  
    header('location:login.php');
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
</head>
<body>
<section class="vh-100 d-flex justify-content-center align-items-center">
  <div class="container-fluid ">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="./images/undraw_login_re_4vu2.svg"
          class="w-100" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 shadow-lg p-5 rounded-4 col-xl-4 offset-xl-1">
        <h1>SignUp</h1>
        <form method="post">
          
        <?php if(! empty($all_errors)):?>
<?php foreach($all_errors as $error):?>
    <h5 class="alert alert-danger"><?= $error?></h5><br>
    <?php endforeach?>
    <?php endif?>


    <!-- Name inputs -->
    <div class="form-outline mb-4 row">
         <div class="col-6">
         <label class="form-label" for="form3Example3">First Name</label>
            <input type="text" name="first_name" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter first name" required/>
         </div>
         <div class="col-6">
         <label class="form-label" for="form3Example3">Last Name</label>
            <input type="text" name="last_name" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter last name" required/>
         </div>
          </div>

  <!-- Age input -->
  <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Age</label>
            <input type="number" name="age" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter your age" required/>
          </div>


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
            
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">SignUp</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">I already have an account <a href="./login.php"
                class="link-danger">Login</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>

</section>

<script src="./JS/bootstrap.bundle.min.js"></script>
</body>
</html>