<?php
        if(isset($_POST["btn_enviar"])){
            $enlace = mysqli_connect("localhost", "root", "", "solarium");
            $txt_user = utf8_decode($_POST["txt_user"]);
            $txt_pass = utf8_decode($_POST["txt_pass"]);
            $sql="SELECT idUsuario,Nombre,Contraseña FROM usuario WHERE Nombre='".$txt_user."' and Contraseña='".$txt_pass."';";
            $stmt = $enlace->prepare($sql);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                mysqli_close($enlace);
                header("location:admin.php");
            }else{
                mysqli_close($enlace);
                header("location:login.php");
            }
        }
    ?>