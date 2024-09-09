<?php
$enlace = mysqli_connect("localhost", "root", "", "solarium");
$id=$_GET["no"];
$sql="DELETE FROM venta_tiene_productos WHERE id_venta_tiene_productos=".$id.";";
mysqli_query($enlace,$sql)or die ("Error al eliminar");
mysqli_close($enlace);
header("location:ventas.php");
?>