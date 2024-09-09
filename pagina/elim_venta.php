<?php
$enlace = mysqli_connect("localhost", "root", "", "solarium");
$id=$_GET["no"];
$sql="DELETE FROM venta WHERE id_venta=".$id.";";
mysqli_query($enlace,$sql)or die ("Error al eliminar");
mysqli_close($enlace);
header("location:ventas.php");
?>