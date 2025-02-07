<?php
// filepath: /C:/xampp/htdocs/sisgestionescolar/app/controllers/roles/delete.php
include('../../../app/config.php');

session_start();
$id_rol = $_POST['id_rol'];

$sentencia = $pdo->prepare("DELETE FROM roles WHERE id_rol = :id_rol");
$sentencia->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);

if ($sentencia->execute()) {
    $_SESSION['mensaje'] = "Rol eliminado exitosamente.";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/roles"); // Redirige al listado de roles
    exit();
} else {
    $_SESSION['mensaje'] = "No se ha podido eliminar el rol. Comuníquese con el administrador.";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/roles"); // Redirige al listado de roles
    exit();
}
?>