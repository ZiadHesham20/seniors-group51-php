<?php
include_once 'config.php';
$data = stripslashes(file_get_contents('php://input'));
$myReadableData = json_decode($data,true);

$studentId = $myReadableData['id'];
$sql = "DELETE FROM `users` WHERE id = $studentId";
mysqli_query($con,$sql);
if (! mysqli_error($con)) {
    echo 'user deleted';
}
else{
    echo 'error';
}
