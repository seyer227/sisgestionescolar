<?php

include ('../app/config.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$query = $pdo->query($sql);
$query ->execute(); 

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
print_r($usuarios);