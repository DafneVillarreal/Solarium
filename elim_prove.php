<?php
$enlace = mysqli_connect("localhost", "root", " ", "solarium");
$id=$_POST["text_1"];
$sql="DELETE FROM proveedor WHERE id_proveedor=".$id.";";
mysqli_query($enlace,$sql)or die ("Error al eliminar");
mysqli_close($enlace);
header("location:proveedores.php");
?>