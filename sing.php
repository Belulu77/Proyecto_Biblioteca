<?php
$servidor = "localhost";
$usuario = "root";
$pass = "";
$base = "BiblioTec";

// Recibir y validar los parámetros
$nombre = $_REQUEST['nombre'];
$apellido = $_REQUEST['apellido'];
$email = $_REQUEST['correo'];
$contraseña = $_REQUEST['contraseña'];
$fecha_registro = $_REQUEST['fecha_registro'];

$conexion = mysqli_connect($servidor, $usuario, $pass, $base) or die("Problemas en la conexión");
$sql = "INSERT INTO usuarios (nombre, apellido, correo, contraseña, fecha_registro) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexion, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'sssss', $nombre, $apellido, $email, $contraseña, $fecha_registro);
        if (mysqli_stmt_execute($stmt)) {
        echo "El usuario pudo inscribirse";
    } else {
        echo "Error al inscribir al usuario: " . mysqli_stmt_error($stmt);
    }
        mysqli_stmt_close($stmt);
} else {
    echo "Error al preparar la consulta: " . mysqli_error($conexion);
}
mysqli_close($conexion);
?>
