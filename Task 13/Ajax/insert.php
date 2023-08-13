<?php
include_once 'config.php';
$data = stripslashes(file_get_contents('php://input'));
$myReadableData = json_decode($data,true);

$name = $myReadableData['name'];
$email = $myReadableData['email'];
$password = $myReadableData['password'];
$id = intval($myReadableData['id']);

$sql = "INSERT INTO `users`(`id`,`name`, `email`, `password`) VALUES ($id,'$name','$email','$password') on Duplicate key update `name`='$name', `email`='$email', `password`='$password'";
mysqli_query($con,$sql);
if (! mysqli_error($con)) {
    echo 'added successfully';
}
else{
    echo 'failed to add';
}