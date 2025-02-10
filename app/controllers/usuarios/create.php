<?php
include('../../../app/config.php');

$nombres = $_POST['nombres'];
$rol_id = $_POST['rol_id'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_repet = $_POST['password_repet'];

if ($password == $password_repet) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $estado_de_registro = 1; // Asumiendo que 1 es el estado activo

    $sentencia = $pdo->prepare("INSERT INTO usuarios (nombres,rol_id,email,password,fyh_creacion,estado) 
                                VALUES (:nombres,:rol_id,:email,:password,:fyh_creacion,:estado)");

    $sentencia->bindParam(':nombres', $nombres);
    $sentencia->bindParam(':rol_id', $rol_id);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam(':fyh_creacion', $fechahora);
    $sentencia->bindParam(':estado', $estado_de_registro);

    try {

        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = 'El usuario se ha registrado correctamente';
            $_SESSION['icono'] = 'success';
            header('Location:' . APP_URL . "/admin/usuarios"); // Redirige al listado de usuarios
        } else {
            session_start();
            $_SESSION['mensaje'] = 'No se ha podido registrar el usuario';
            $_SESSION['icono'] = 'error';
            ?> <script>
            window.history.back();
            </script>
        <?php  
        }
    } catch (Exception $exception) {
        session_start();
        $_SESSION['mensaje'] = 'El email ya se encuentra registrado';
        $_SESSION['icono'] = 'error';
        ?> <script>
            window.history.back();
            </script>
        <?php   }
} else {
    echo "las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje'] = 'Las contraseñas no coinciden';
    $_SESSION['icono'] = 'error';
    ?> <script>
        window.history.back();
    </script>
<?php
}
