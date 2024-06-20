<?php

// Parámetros de la base de datos
$servername = "localhost";
$username = "u431487635_rootH";
$password = "000Eeb_15";
$dbname = "u431487635_dbjogosaH";

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para recuperar la información deseada
$sql = "SELECT emailUser, opinion FROM opiniones";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    // Preparar el contenido del correo
    $contenidoCorreo = "";
    while ($fila = $resultado->fetch_assoc()) {
        $contenidoCorreo .= "emailUser: " . $fila["emailUser"] . ", opinion: " . $fila["opinion"] . "\n";
    }

    // Destinatario y asunto del correo
    $destinatario = "jdgs.1505@gmail.com";
    $asunto = "Informe desde la base de datos";

    // Enviar correo electrónico
    $headers = "From: jdgs.1505@gmail.com"; // Cambia esto a tu dirección de correo
    if (mail($destinatario, $asunto, $contenidoCorreo, $headers)) {
        echo "Correo enviado correctamente.";
    } else {
        echo "Error al enviar el correo.";
    }
} else {
    echo "No se encontraron resultados.";
}

// Cerrar conexión
$conn->close();
?>
