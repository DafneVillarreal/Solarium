<?php
    $enlace = mysqli_connect("localhost", "root", "", "solarium", "3306");

    
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $action = $_POST['action']; 

    $enlace = mysqli_connect("localhost", "root", "", "solarium", "3306");

    if ($action == 'si') {
        $sql = "SELECT id_empleado FROM empleados WHERE status=1";
        $stmt = $enlace->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id_empleado);

        if ($stmt->num_rows > 0) {
            $update_sql = "UPDATE empleados SET status=0 WHERE id_empleado = ?";
            $update_stmt = $enlace->prepare($update_sql);

            while ($stmt->fetch()) {
                $update_stmt->bind_param("i", $id_empleado);
                $update_stmt->execute();
            }
            $update_stmt->close();
        } else {
            echo "No se encontraron empleados con status=1.";
        }
        $stmt->close();
        mysqli_close($enlace);
        header("Location: index.php");
    } 
    
    else {
        mysqli_close($enlace);
        header("Location: home.php");
        exit();
    }
}
?>
