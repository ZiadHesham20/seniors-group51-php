<?php
$arr1 = [1,2,3,4,5];
$arr2 = [6,7,8,9,10,2];
var_dump(array_merge($arr1,$arr2));
var_dump(in_array(2,$arr1));
var_dump(array_diff($arr1,$arr2));
var_dump(array_diff_assoc($arr1,$arr2))
?>