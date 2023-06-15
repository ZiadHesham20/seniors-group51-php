<?php

$allLangs = ['php','java','js'];

$allLangs[0] = 'c++'; 
$allLangs[] = 'dart';

var_dump($allLangs);

$userinfo = ['name' => 'ziad','age' => '21' ,'password' => '1235','email' => 'ziad@gmail.com'];

var_dump($userinfo);
echo $userinfo['name']
?>