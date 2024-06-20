<?php
include ("conexion.php");

if (isset($_POST['register'])) {
    if (strlen($_POST['emailUser']) >= 1 && strlen($_POST['opinion']) >= 1) {
        $email = trim($_POST['emailUser']);
        $opinion = trim($_POST['opinion']);
        
        // SQL Injection prevention should be addressed here for security.
        $consulta = "INSERT INTO opiniones(emailUser, opinion) VALUES ('$email', '$opinion')";
        $resultado = mysqli_query($conn, $consulta);

        if ($resultado) {
            ?>
            <script>
                alert("Mensaje enviado correctamente");
                window.location.href = '/index.html';
            </script>
            <?php
        } else {
            ?>
            <h5 class="bad">Error al enviar la opinión</h5>
            <?php
        }
    } else {
        ?>
        <h5 class="bad">Complete todos los campos</h5>
        <?php
    }
}
?>
