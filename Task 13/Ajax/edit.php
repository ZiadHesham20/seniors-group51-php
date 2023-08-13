<?php
include_once 'config.php';
$data = stripslashes(file_get_contents('php://input'));
$myReadableData = json_decode($data,true);

$studentId = $myReadableData['id'];
$sql = "SELECT * FROM `users` WHERE id = $studentId";
$query = mysqli_query($con,$sql);
if (! mysqli_error($con)) {
   $user = mysqli_fetch_assoc($query);
   echo json_encode($user);
}
else{
    echo 'error';
}
