<?php

require_once "User.php";
require_once "Database.php";

$databaseClass = new Database();

$ahmed = new User($databaseClass);

var_dump($ahmed->userDatabase->setConnection());

// Dependency injection
