<?php
$con = mysqli_connect('localhost','root','','procedur_test',3308);
$id = 1;
$stat = "CALL `grtFullData`($id);";
var_dump(mysqli_fetch_assoc(mysqli_query($con,$stat)));