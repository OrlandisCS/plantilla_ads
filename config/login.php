<?php
session_start();
require_once './conexion.php';
if (isset($_POST['iniciarSesion'])) {
    $usuario = $_POST['usuario'];
    $pdw = $_POST['pdw'];
    $sql = mysqli_query($conexion, "SELECT * FROM admin WHERE usuario='$usuario' AND contraseña='$pdw'");
    if (mysqli_num_rows($sql) >= 1) {
        $user = mysqli_fetch_array(($sql));
        $_SESSION['usuario_logueado'] =  $user['id'];
        $array = [
            'usuario' => $user['usuario'],
            'mensaje' => 'Inicio correcto',
        ];
    } else {
        $array = [
            'mensaje' => 'Inicio no correcto',
        ];
    }
    echo json_encode($array);
}
