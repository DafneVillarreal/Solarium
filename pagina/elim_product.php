<?php
$enlace = mysqli_connect("localhost", "root", "", "solarium");
$id=$_POST["text_2"];
$sql="DELETE FROM producto WHERE id_producto=".$id.";";
mysqli_query($enlace,$sql)or die ("Error al eliminar");
mysqli_close($enlace);
header("location:A_productos.php");
?>