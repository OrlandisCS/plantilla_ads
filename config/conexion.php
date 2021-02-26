<?php
$server = 'serverName';
$user = 'User database';
$pwd = 'password database';
$database = 'database name';
try {
    //code...
    $conexion = new mysqli($server, $user, $pwd, $database);
} catch (Throwable $th) {
    throw $th;
}
