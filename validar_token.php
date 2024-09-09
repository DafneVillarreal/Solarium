<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $enlace = mysqli_connect("localhost", "root", "", "solarium");

    if (!$enlace) {
        die("Error en la conexión: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM empleados WHERE token = ? AND token_expira > NOW()";
    $stmt = $enlace->prepare($query);

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $enlace->error);
    }

    $stmt->bind_param("s", $token);  
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: cambiar_contra.php");
    } else {
        echo "El token es inválido o ha expirado. Solicita un nuevo enlace.";
    }

    $stmt->close();
    $enlace->close();
}
?>
