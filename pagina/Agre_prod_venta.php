<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Ventas</title>
        <?php include ("header.php"); ?>
    </head>

    <body  class='msgbody' style='width: 100%'><a name="msgtop"></a><div id="msgwebcontainer" class="msgwebcontainer" direction="ltr"><div id="msp39_HeaderExternal" class="HeaderExternal_wp_outer"><div style="height:0px;width:0px;"> </div><div id="msp39_Header" class="Header_wp_outer"><div style="height:0px;width:0px;"> </div><div style="height:0px;width:0px;"> </div><div id="msp39_HeaderInternal" class="HeaderInternal_wp_outer" style="position:relative;"><header><div class="msgbody27001913"><div style="height:0px;width:0px;"> </div><div id="inc37_container1" class="inc37_container1_wp_outer"><div style="height:0px;width:0px;"> </div><div id="inc37_freehtml1" class="inc37_freehtml1_wp_outer"><div class="clear_div" style="clear:both;height:0px;"> </div></div><div class="clear_div" style="clear:both;height:0px;"> </div></div><div id="inc37_container7" class="inc37_container7_wp_outer"><div style="height:0px;width:0px;"> </div><div id="inc37_container2" class="inc37_container2_wp_outer"><div style="height:0px;width:0px;"> </div><div class="inc37_columns1_swp_outer_bg"><div id="inc37_columns1" class="inc37_columns1_wp_outer wp_columns stick-header"><div class="wp_column wp_first_col inc37_columns1_col_3"><div class="wp_bg inc37_columns1_col_bg_3" rel="inc37_container6"></div><div class="wp_column inc37_columns1_col_2"><div class="wp_bg inc37_columns1_col_bg_2" rel="inc37_container5"></div><div class="wp_column inc37_columns1_col_1"><div class="wp_bg inc37_columns1_col_bg_1" rel="inc37_container4"></div><div class="wp_column inc37_columns1_col_0"><div class="wp_bg inc37_columns1_col_bg_0" rel="inc37_container3"></div><div id="inc37_container3" class="wp_col_content inc37_columns1_col_box_0"><div style="height:0px;width:0px;"> </div><div id="inc37_logo1" class="inc37_logo1_wp_outer"><div style="height:100%"><a u="image" href="/" aria-label="Volver al inicio"><img src="https://tqpytokz.cdn.imgeng.in/media-adsa/static/4206/039.jpg" alt="SOLARIUM SISTEMAS DE ENERGÍA SOLAR" title="SOLARIUM SISTEMAS DE ENERGÍA SOLAR" style="max-width:100%;max-height:100%" /></a></div><div class="clear_div" style="clear:both;height:0px;"> </div></div><div class="clear_div" style="clear:both;height:0px;"> </div></div><div id="inc37_container4" class="wp_col_content inc37_columns1_col_box_1"><div style="height:0px;width:0px;"> </div><div id="inc37_menucomp2" class="inc37_menucomp2_wp_outer efecto-5"><nav role="navigation"><ul id="ul_inc37_menu_menucomp2" class="mlhmenu inc37_menucomp2" style=""><li id="li_inc37_menu_menucomp20" style=";">


    <a role="menuitem" onclick="if(scroolSmooth(this,1000)) return false;;window.open('/#inicio','_self'); return false;" href="ventas.php" style="float: none;" class="inc37_menucomp2_item inc37_menucomp2_selected" aria-label="Enlace a la página INICIO">SALIR</a></li><li id="li_inc37_menu_menucomp21" style=";">
    <a role="menuitem" onclick="if(scroolSmooth(this,1000)) return false;;window.open('/#productos-y-servicios','_self'); return false;" href="ventas.php" style="float: none;" class="inc37_menucomp2_item" aria-label="Enlace a la página PRODUCTOS Y SERVICIOS">VENTAS</a></li><li id="li_inc37_menu_menucomp22" style=";">
    <div class="clear_div" style="clear:both;height:0px;"> </div></div></div><div id="inc37_container5" class="wp_col_content inc37_columns1_col_box_2"><div style="height:0px;width:0px;"> </div></div><div class="clear_div" style="clear:both;height:0px;"> </div></div></div></div></div></div><div style="clear:both;height:0px;width:0px;"> </div></div></div>
    <div id="msp39_MainColumns" class="MainColumns_wp_outer wp_columns" name="content-top"><div class="wp_column wp_first_col MainColumns_col_0"><div class="page55_container8_swp_outer_bg paralaxbg" data-paralaxbg-speed="2"><div id="page55_container8" class="container8_wp_outer toper" name="inicio"><a name="inicio_old" aria-label=""></a>

        <h1>Agregar productos a venta</h1>
                <br><br>
                <div class="container mt-5">
                    <div class="row" style="justify-content: center;">
                        <?php
                        $enlace = mysqli_connect("localhost", "root", "", "solarium");
                        $sql =$enlace->query("SELECT id_producto,Nombre,Precio,Stock,id_categoria,id_proveedor FROM producto;");
                        while($fila=$sql->fetch_array()){
                            echo "<div class='card m-4 bg-dark text-white' style='width: 18rem;'><form id='formulario' name='formulario' method='post'  action=''><input name='precio' type='hidden' id='precio' value='".$fila["Precio"]."'/><input name='id_producto' type='hidden' id='titulo' value='".$fila["id_producto"]."'/><div class='card-body'><h5 class='card-title'>".$fila["Nombre"]."</h5><p class='card-txt'>Descripción - Precio $".$fila["Precio"]."</p><input name='cantidad' type='hidden' id='cantidad' value='1' class='pl-2'><button name='btn_enviar' class='btn btn-primary' type='submit'><i class='fas fa-shopping-cart'></i>Añadir a la venta</butoon></div></form></div>";                                               
                        } 
                        mysqli_close($enlace);
                        ?>                                                            
                    </div>
                </div>
                <?php
        if(isset($_POST["btn_enviar"])){
            $enlace = mysqli_connect("localhost", "root", "", "solarium");
            $id_prod = utf8_decode($_POST["id_producto"]);
            $cantidad = utf8_decode($_POST["cantidad"]);
            $precio = utf8_decode($_POST["precio"]);
            
            // Verificar si ya existe una venta en curso (puedes definir esta lógica según tu aplicación, por ejemplo, almacenar el id_venta en una sesión)
            if(!isset($_SESSION['id_venta'])){
                // Si no hay venta en curso, crear una nueva
                $sql = "INSERT INTO venta (Fecha, Total, id_empleado, id_cliente) VALUES (NOW(), 0, 3, 5);"; // Ajusta id_empleado y id_cliente según corresponda
                if($enlace->query($sql) === TRUE){
                    $id_venta = $enlace->insert_id; // Obtener el id de la nueva venta
                    $_SESSION['id_venta'] = $id_venta; // Guardar el id_venta en la sesión
                } else {
                    echo "Error al crear la venta: " . $enlace->error;
                    exit;
                }
            } else {
                // Si ya hay una venta en curso, usar ese id_venta
                $id_venta = $_SESSION['id_venta'];
            }
            
            // Insertar en la tabla venta_tiene_productos
            $sql = "INSERT INTO venta_tiene_productos(precio, cantidad, id_venta, id_producto) VALUES('".$precio."', '".$cantidad."', '".$id_venta."', '".$id_prod."');";
            if($enlace->query($sql) === TRUE){
                // Actualizar el total de la venta
                $sql_total = "UPDATE venta SET Total = (
                                SELECT SUM(precio * cantidad) FROM venta_tiene_productos WHERE id_venta = '".$id_venta."'
                            ) WHERE id_venta = '".$id_venta."';";
                if($enlace->query($sql_total) === TRUE){
                    echo "Producto añadido y venta actualizada correctamente.";
                } else {
                    echo "Error al actualizar la venta: " . $enlace->error;
                }
            } else {
                echo "Error al añadir el producto: " . $enlace->error;
            }
            
            mysqli_close($enlace);
        }
        ?>

                <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th class="text-danger"></th>
                    </tr>
                </thead>    
                <tbody>
                    <?php
                    $enlace = mysqli_connect("localhost", "root", "", "solarium");
                    $sql="SELECT A.id_venta_tiene_productos as id, B.Nombre as producto,B.Precio as precio,A.Cantidad as cantidad FROM venta_tiene_productos A
                    INNER JOIN producto B ON B.id_producto=A.id_producto
                    INNER JOIN venta C ON C.id_venta=A.id_venta;";
                    $result=$enlace->query($sql);
                    while($fila=$result->fetch_assoc()){
                        echo "<tr data-id=".$fila['id'].">";
                        echo "<td>".$fila['producto']."</td>";
                        echo "<td>".$fila['precio']."</td>";
                        echo "<td>".$fila['cantidad']."</td>";
                        echo "<td><a href='elim_prod_venta.php?no=".$fila['id']."'><button type='button' class='btn btn-danger'>Eliminar</button></a></td>";              
                    }
                    $sql2="";
                    mysqli_close($enlace);
                    ?>     
                </tbody>
            </table>
            <!-- Bootstrap JavaScript Libraries -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>