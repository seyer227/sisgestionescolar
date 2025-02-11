<?php
// filepath: /C:/xampp/htdocs/sisgestionescolar/app/controllers/roles/delete.php
include('../../../app/config.php');


$id_rol = $_POST['id_rol'];

$sql_usuarios = "SELECT * FROM usuarios WHERE estado = '1' and rol_id = '$id_rol'";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
$contador = 0;
foreach ($usuarios as $usuario) {
    $contador = $contador + 1;
}
if ($contador > 0) {
    session_start();
    $_SESSION['mensaje'] = "Existen usuarios con este rol, no se puede eliminar.";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/roles"); // Redirige al listado de roles
} else {
    echo "no existe este rol en otra tabla, se puede eliminar";
    $sentencia = $pdo->prepare("DELETE FROM roles WHERE id_rol = :id_rol");
    $sentencia->bindParam(':id_rol', $id_rol);

    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Rol eliminado exitosamente.";
        $_SESSION['icono'] = "success";
        header('Location:' . APP_URL . "/admin/roles"); // Redirige al listado de roles
        exit();
    } else {
        session_start();
        $_SESSION['mensaje'] = "No se ha podido eliminar el rol. Comuníquese con el administrador.";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/admin/roles"); // Redirige al listado de roles
    }
}
