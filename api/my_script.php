<?php

include("conexion.php");

$sql = "SELECT emailUser, opinion FROM opiniones";
$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Construir el contenido del correo con las opiniones
    $comentarios = "";
    while($row = $result->fetch_assoc()) {
        $comentarios .= "Email: " . $row["emailUser"]. " - Opinión: " . $row["opinion"]. "\n";
    }

    // Destinatario y asunto del correo
    $destinatario = "jdgs.1505@gmail.com";
    $asunto = "Nuevos comentarios en la página web";

    // Enviar correo electrónico
    $headers = "From: jdgs.1505@gmail.com"; // Reemplaza con tu dirección de correo electrónico
    $enviado = mail($destinatario, $asunto, $comentarios, $headers);

    if($enviado) {
        echo "Correo enviado correctamente.";
    } else {
        echo "Error al enviar el correo.";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>