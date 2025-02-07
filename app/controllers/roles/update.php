<?php
include('../../../app/config.php');

session_start();
$id_rol = $_POST['id_rol'];

if (!isset($_POST['nombre_rol']) || trim($_POST['nombre_rol']) == '') {
    $_SESSION['mensaje'] = "El nombre del rol no puede estar vacío.";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/roles/edit.php?id=".$id_rol); // Redirige al formulario
    exit();
} else {
    $nombre_rol = strtoupper(trim($_POST['nombre_rol'])); // Convertir a mayúsculas
    $fyh_actualizacion = date('Y-m-d H:i:s');
    $estado = 1;

    // Verificar si el nombre del rol ya existe para otro registro
    $verificar_sql = "SELECT COUNT(*) FROM roles WHERE nombre_rol = :nombre_rol AND id_rol != :id_rol";
    $verificar_stmt = $pdo->prepare($verificar_sql);
    $verificar_stmt->bindParam(':nombre_rol', $nombre_rol, PDO::PARAM_STR);
    $verificar_stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
    $verificar_stmt->execute();
    $existe = $verificar_stmt->fetchColumn();

    if ($existe > 0) {
        $_SESSION['mensaje'] = "Este rol ya existe en la base de datos.";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/edit.php?id=".$id_rol); // Redirige al formulario
        exit();
    }

    $sentencia = $pdo->prepare("UPDATE roles 
                                SET nombre_rol = :nombre_rol, fyh_actualizacion = :fyh_actualizacion
                                WHERE id_rol = :id_rol");

    $sentencia->bindParam(':nombre_rol', $nombre_rol, PDO::PARAM_STR);
    $sentencia->bindParam(':fyh_actualizacion', $fyh_actualizacion, PDO::PARAM_STR);
    $sentencia->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);

    try {
        if ($sentencia->execute()) {
            $_SESSION['mensaje'] = "Rol actualizado exitosamente.";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles"); // Redirige al listado de roles
            exit();
        } else {
            $_SESSION['mensaje'] = "No se ha podido actualizar el rol. Comuníquese con el administrador.";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles/edit.php?id=".$id_rol); // Redirige al formulario
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Error en la base de datos: " . $e->getMessage();
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/edit.php?id=".$id_rol); // Redirige al formulario
        exit();
    }
}
?>