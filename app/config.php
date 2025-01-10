<?php

define ('SERVIDOR','localhost');
define ('USUARIO','root');
define ('PASSWORD','');
define ('BD','sisgestionescolar');

define ('APP_NAME','SISTEMA DE GESTION ESCOLAR');
define ('APP_URL','http://localhost/sisgestionescolar');
define ('KEY_API_MAPS','');

$servidor = "mysql:dbname=".DB.";host=".SERVIDOR;

try {
    $pdo = new PDO ($servidor, username:USUARIO ,passwd:PASSWORD,
            array (PDO::MYSQL_))
} catch (\Throwable $th) {
    //throw $th;
}