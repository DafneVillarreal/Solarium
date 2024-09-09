<?php
$enlace = mysqli_connect("localhost", "root", "", "solarium");
$id=$_POST["text_1"];
$sql="DELETE FROM cliente WHERE id_cliente=".$id.";";
mysqli_query($enlace,$sql)or die ("Error al eliminar");
mysqli_close($enlace);
header("location:clientes.php");
?>