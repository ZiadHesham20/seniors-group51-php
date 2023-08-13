<?php
require_once "oopTest.php";
$moSalah = new Player();
$messi = new Player();

$moSalah->setName('Mohmed Salah');

$moSalah->position = 'RW';
$moSalah->speed = 91;
$moSalah->club = 'liverpool';

$messi->setName('Leo Messi');

$messi->position = 'CF';
$messi->speed = 87;
$messi->club = 'inter miami';
echo $messi->getName();
echo $moSalah->getName();

var_dump($moSalah);
var_dump($messi);