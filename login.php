<?php
$servidor = "localhost";
$usuario = "root";
$pass = "";
$base = "BiblioTec";

// Recibir y validar los parámetros
$email = $_REQUEST['correo'];
$contraseña = $_REQUEST['contraseña'];

$conexion = mysqli_connect($servidor, $usuario, $pass, $base) or die("Problemas en la conexión");
$sql = "INSERT INTO usuarios (correo, contraseña) VALUES (?, ?)";
$stmt = mysqli_prepare($conexion, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'ss', $email, $contraseña);
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
