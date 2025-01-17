<?php

include ('../app/config.php');

$email = $_POST['email'];
$password = $_POST['password']; 

$sql = "SELECT * FROM usuarios WHERE email = :email AND estado = '1'";
$query = $pdo->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

$contador = 0;
$password_tabla = '';

foreach ($usuarios as $usuario) {
    $password_tabla = $usuario['password'];
    $contador++;
}

if (($contador > 0) && password_verify($password, $password_tabla)) {
    echo "los datos son correctos";
    header('Location:'.APP_URL."/admin");
    exit();
} else {
    echo "los datos son incorrectos";
    session_start();
    $_SESSION['mensaje'] = "Los datos son incorrectos";
    header('Location:'.APP_URL."/login");
    exit();
}