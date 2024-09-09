<?php
$enlace = mysqli_connect("localhost", "root", "", "solarium");
$id=$_POST["text_2"];
$sql="DELETE FROM categoria WHERE id_categoria=".$id.";";
mysqli_query($enlace,$sql)or die ("Error al eliminar");
mysqli_close($enlace);
header("location:categorias.php");
?>