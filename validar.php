<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $action = $_POST['action']; 
    $usuario = $_POST['user']; 
    $pass = $_POST['password']; 

    $enlace = mysqli_connect("localhost", "root", "", "solarium", "3306");

    if (!$enlace) {
        die("Error en la conexión: " . mysqli_connect_error());
    }

    if ($action == 'entrar') {
        $sql = "SELECT id_empleado, pass FROM empleados WHERE id_empleado = ? AND pass = ?";
        $stmt = $enlace->prepare($sql);

        if ($stmt === false) {
            die('Error en la preparación de la consulta: ' . $enlace->error);
        }

        $stmt->bind_param("ss", $usuario, $pass);

        $stmt->execute();

        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $sql = "UPDATE empleados SET status=1 WHERE id_empleado = ?";
            $stmt = $enlace->prepare($sql);
            $stmt->bind_param("i", $usuario);
            $stmt->execute();
            header("Location: home.php");
            mysqli_close($enlace);
            exit(); 
        } else {
            mysqli_close($enlace);
            header("Location: index.php");
            exit();
        }
    } 
    
    else {
        mysqli_close($enlace);
        header("Location: recuperacion.php");
        exit();
    }
}
?>
