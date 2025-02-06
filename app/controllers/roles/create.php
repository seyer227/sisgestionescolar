<?php

include('../../../app/config.php');

session_start();

if (!isset($_POST['nombre_rol']) || trim($_POST['nombre_rol']) == '') {
    $_SESSION['mensaje'] = "El nombre del rol no puede estar vacío.";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/roles/create.php"); // Redirige al formulario
    exit();
} else {
    $nombre_rol = strtoupper(trim($_POST['nombre_rol'])); // Convertir a mayúsculas
    $fyh_creacion = date('Y-m-d H:i:s');
    $estado = 1;

    $sentencia = $pdo->prepare("INSERT INTO roles 
                                (nombre_rol, fyh_creacion, estado) 
                                VALUES (:nombre_rol, :fyh_creacion, :estado)");

    $sentencia->bindParam(':nombre_rol', $nombre_rol, PDO::PARAM_STR);
    $sentencia->bindParam(':fyh_creacion', $fyh_creacion, PDO::PARAM_STR);
    $sentencia->bindParam(':estado', $estado, PDO::PARAM_INT);

    try {
        if ($sentencia->execute()) {
            $_SESSION['mensaje'] = "Rol creado exitosamente.";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles"); // Redirige al listado de roles
            exit();
        } else {
            $_SESSION['mensaje'] = "No se ha podido crear el rol. Comuníquese con el administrador.";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles/create.php"); // Redirige al formulario
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Este rol ya existe en la base de datos";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/create.php"); // Redirige al formulario
        exit();
    }
}
?>