<?php

define ('SERVIDOR','localhost');
define ('USUARIO','root');
define ('PASSWORD','');
define ('BD','sisgestionescolar');

define ('APP_NAME','Sistema Smart');
define ('APP_URL','http://localhost/sisgestionescolar');
define ('KEY_API_MAPS','');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try {
    $pdo = new PDO ($servidor, USUARIO, PASSWORD,
            array (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            "conexion exitosa a la base de datos";
} catch (PDOException $e) {
    "conexion fallida a la base de datos";
}
date_default_timezone_set('America/Mexico_City');
$fechahora = date(format: 'Y-m-d H:i:s');
$fecha_actual= date(format: 'Y-m-d');
$dia_actual = date(format: 'd');
$mes_actual = date(format: 'm');
$ano_actual = date(format: 'Y');
$hora = date(format: 'H:i:s');

