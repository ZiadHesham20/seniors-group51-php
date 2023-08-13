<?php
include_once 'config.php';

$sql = "SELECT * FROM users";
$query = mysqli_query($con,$sql);
$allStudents = [];
while ($student = mysqli_fetch_assoc($query)) {
    $allStudents[] = $student; 
}
if (! mysqli_error($con)) {
    echo json_encode($allStudents);
}
else{
    echo 'failed to add';
}