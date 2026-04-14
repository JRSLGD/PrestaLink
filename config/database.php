<?php

$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=UTF-8", $user, $pass);