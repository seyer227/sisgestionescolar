<?php
// filepath: /C:/xampp/htdocs/sisgestionescolar/app/controllers/roles/delete.php
include('../../../app/config.php');

session_start();
$id_usuario = $_POST['id_usuario'];

$sentencia = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario = :id_usuario");
$sentencia->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

if ($sentencia->execute()) {
    $_SESSION['mensaje'] = "Usuario eliminado exitosamente.";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/usuarios"); // Redirige al listado de roles
    exit();
} else {
    $_SESSION['mensaje'] = "No se ha podido eliminar el usuario. Comuníquese con el administrador.";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/usuarios"); // Redirige al listado de roles
    exit();
}
?>