<?php
$enlace = mysqli_connect("localhost", "root", "", "solarium");
$id=$_POST["text_2"];
$sql="DELETE FROM empleados WHERE id_empleado=".$id.";";
mysqli_query($enlace,$sql)or die ("Error al eliminar");
mysqli_close($enlace);
header("location:empleados.php");
?>