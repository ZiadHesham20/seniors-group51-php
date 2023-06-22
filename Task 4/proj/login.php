<?php
require_once "data.php";

if (isset($_POST['username'])) {
    $username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$flag = 0;

$users = [
	'user1' => ['username' => $username , 'email' => $email , 'password' =>$password],
  ];

setcookie("username", $username);
$allerrors = [];
//
if (! empty($username)) {
   if (strlen($username) > 4) {
    if (preg_match('/\b\w*\d\w*\b/',$username)) {
		array_push($users,$username);
       $flag ++;
    }
    else{
        $allerrors['usernameRegex'] = "User name must include Number ";
    }
   }
   else{
    $allerrors['usernameLen'] = "User name must be longer than 4 characters ";
   }
}
else{
    $allerrors['usernameFill'] = "you didnt write any thing ";
}
if (! empty($email)) {
    if (strlen($email) > 4) {
     if (preg_match('/.com$/',$email)) {
        $flag ++;
     }
     else{
        $allerrors['emailRegex'] = "must end with .com";
     }
    }
    else{
        $allerrors['emailLen'] = "User name must be longer than 4 characters ";
    }
 }
 else{
    $allerrors['emailFill'] = "you didnt write any thing ";
 }
 if (! empty($password)) {
    if (strlen($password) > 8) {
     if (preg_match('/\b[A-Z][a-zA-Z]*\d+\w*\b/',$password)) {
        $flag ++;
     }
     else{
        $allerrors['passwordRegex'] =  "Password must start with capital letter and must include number ";
     }
    }
    else{
        $allerrors['passwordLen'] = "Password must be longer than 8 characters ";
    }
 }
 else{
    $allerrors['passwordFill'] = "you didnt write any thing ";
 }

// foreach ($users as $user) {
    
// }

if ($flag == 3) {
    if ($username == 'admin1' && $email == 'admin@gmail.com') {
		header('location: dashboard.php');
	}
	else{
		

		header('location: index.php');
	}
}
else{
    echo 'Try again';
}
}

var_dump($_GET);
var_dump($_POST);

// var_dump($users)
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

body {
	background: #f6f5f7;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
}

h2 {
	text-align: center;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

button {
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 1000px;
	height: 550px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

.sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}
.radiosec{
	display: flex;
	align-items: center;
	
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.container.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

.overlay {
	background: #FF416C;
	background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
	background: linear-gradient(to right, #FF4B2B, #FF416C);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
	transform: translateX(0);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.container.right-panel-active .overlay-right {
	transform: translateX(20%);
}

.social-container {
	margin: 20px 0;
}

.social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}

footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

footer p {
    margin: 10px 0;
}

footer i {
    color: red;
}

footer a {
    color: #3c97bf;
    text-decoration: none;
}
    </style>

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="post">
			<h1>SignIn</h1>
            <input type="text" name="username" placeholder="Username" />
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<input type="color" name='color'>
			<input type="date" name='date'>
			<div class='radiosec'>
		<div class='radiosec'>
		<input type="radio" id='male' name ='gender'>
			<label for="male">Male</label>
		</div>
			<div class='radiosec'>
			<input type="radio" id='female' name ='gender'>
			<label for="female">Female</label>
			</div>
			</div>
			
<select name="level">
  <option value="junior">Junior</option>
  <option value="senior">Senior</option>
  <option value="professional">Professional</option>
</select>
<div class="radiosec">
<div class="radiosec">
<input type="checkbox" id="php" name="php" value="php">
<label for="php"> PHP</label>
</div>
<div class="radiosec" style="margin-left: 1rem;margin-Right: 1rem;">
	<input type="checkbox" id="js" name="js" value="js">
<label for="js"> JS</label>
</div>
<div class="radiosec">
<input type="checkbox" id="c++" name="c++" value="c++">
<label for="c++"> C++</label>
</div>
</div>
<textarea id="w3review" name="description" rows="4" cols="40">
</textarea>
			<button style='margin-top: 1rem;'>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
            <?php if(! empty($allerrors)):?>
<?php foreach($allerrors as $error):?>
    <h5><?= $error?></h5><br>
    <?php endforeach?>
    <?php endif?>

			</div>
		</div>
	</div>
</div>

</body>
</html>