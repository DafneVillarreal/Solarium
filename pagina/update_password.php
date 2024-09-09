<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['codigo']; 
    $contra = $_POST['contra']; 
    }

    // Conexión a la base de datos
    $enlace = mysqli_connect("localhost", "root", "", "solarium");

    $sql = "UPDATE empleados SET pass = ? WHERE id_empleado = ?";
    $stmt = $enlace->prepare($sql);
    $stmt->bind_param("si", $contra, $usuario);
    $stmt->execute();
    $stmt->store_result();

        if ($stmt->num_rows > 0) {
            mysqli_close($enlace);
            header("Location: home.php");
        } else {
            mysqli_close($enlace);
            header("Location: index.php");
            exit();
        }
?>
