<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Proveedores</title>
        <?php include ("header.php"); ?>
    </head>


    <body  class='msgbody' style='width: 100%'><a name="msgtop"></a><div id="msgwebcontainer" class="msgwebcontainer" direction="ltr"><div id="msp39_HeaderExternal" class="HeaderExternal_wp_outer"><div style="height:0px;width:0px;"> </div><div id="msp39_Header" class="Header_wp_outer"><div style="height:0px;width:0px;"> </div><div style="height:0px;width:0px;"> </div><div id="msp39_HeaderInternal" class="HeaderInternal_wp_outer" style="position:relative;"><header><div class="msgbody27001913"><div style="height:0px;width:0px;"> </div><div id="inc37_container1" class="inc37_container1_wp_outer"><div style="height:0px;width:0px;"> </div><div id="inc37_freehtml1" class="inc37_freehtml1_wp_outer"><div class="clear_div" style="clear:both;height:0px;"> </div></div><div class="clear_div" style="clear:both;height:0px;"> </div></div><div id="inc37_container7" class="inc37_container7_wp_outer"><div style="height:0px;width:0px;"> </div><div id="inc37_container2" class="inc37_container2_wp_outer"><div style="height:0px;width:0px;"> </div><div class="inc37_columns1_swp_outer_bg"><div id="inc37_columns1" class="inc37_columns1_wp_outer wp_columns stick-header"><div class="wp_column wp_first_col inc37_columns1_col_3"><div class="wp_bg inc37_columns1_col_bg_3" rel="inc37_container6"></div><div class="wp_column inc37_columns1_col_2"><div class="wp_bg inc37_columns1_col_bg_2" rel="inc37_container5"></div><div class="wp_column inc37_columns1_col_1"><div class="wp_bg inc37_columns1_col_bg_1" rel="inc37_container4"></div><div class="wp_column inc37_columns1_col_0"><div class="wp_bg inc37_columns1_col_bg_0" rel="inc37_container3"></div><div id="inc37_container3" class="wp_col_content inc37_columns1_col_box_0"><div style="height:0px;width:0px;"> </div><div id="inc37_logo1" class="inc37_logo1_wp_outer"><div style="height:100%"><a u="image" href="/" aria-label="Volver al inicio"><img src="https://tqpytokz.cdn.imgeng.in/media-adsa/static/4206/039.jpg" alt="SOLARIUM SISTEMAS DE ENERGÍA SOLAR" title="SOLARIUM SISTEMAS DE ENERGÍA SOLAR" style="max-width:100%;max-height:100%" /></a></div><div class="clear_div" style="clear:both;height:0px;"> </div></div><div class="clear_div" style="clear:both;height:0px;"> </div></div><div id="inc37_container4" class="wp_col_content inc37_columns1_col_box_1"><div style="height:0px;width:0px;"> </div><div id="inc37_menucomp2" class="inc37_menucomp2_wp_outer efecto-5"><nav role="navigation"><ul id="ul_inc37_menu_menucomp2" class="mlhmenu inc37_menucomp2" style=""><li id="li_inc37_menu_menucomp20" style=";">
        <a role="menuitem" onclick="if(scroolSmooth(this,1000)) return false;;window.open('/#inicio','_self'); return false;" href="admin.php" style="float: none;" class="inc37_menucomp2_item inc37_menucomp2_selected" aria-label="Enlace a la página INICIO">SALIR</a></li><li id="li_inc37_menu_menucomp21" style=";">
        <a role="menuitem" onclick="if(scroolSmooth(this,1000)) return false;;window.open('/#productos-y-servicios','_self'); return false;" href="ventas.php" style="float: none;" class="inc37_menucomp2_item" aria-label="Enlace a la página PRODUCTOS Y SERVICIOS">VENTAS</a></li><li id="li_inc37_menu_menucomp22" style=";">
        <a role="menuitem" onclick="if(scroolSmooth(this,1000)) return false;;window.open('login.php','_self'); return false;" href="A_productos.php" style="float: none;" class="inc37_menucomp2_item" aria-label="Enlace a la página CONTACTO">PRODUCTOS</a></li></ul></nav><div class="clear_div" style="clear:both;height:0px;"> </div></div><div id="inc37_freehtml2" class="inc37_freehtml2_wp_outer">
        <div class="clear_div" style="clear:both;height:0px;"> </div></div></div><div id="inc37_container5" class="wp_col_content inc37_columns1_col_box_2"><div style="height:0px;width:0px;"> </div></div><div class="clear_div" style="clear:both;height:0px;"> </div></div></div></div></div></div><div style="clear:both;height:0px;width:0px;"> </div></div></div>

        <div id="msp39_MainColumns" class="MainColumns_wp_outer wp_columns" name="content-top"><div class="wp_column wp_first_col MainColumns_col_0"><div class="page55_container8_swp_outer_bg paralaxbg" data-paralaxbg-speed="2"><div id="page55_container8" class="container8_wp_outer toper" name="inicio"><a name="inicio_old" aria-label=""></a>
            <h1>Proveedores</h1>
            <br><br>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Pagina</th>
                        <th class="text-danger"></th>
                    </tr>
                </thead>
                <tbody>
                    <form action="Agre_prove.php">
                        <input type="submit" value="Agregar" name="btn_agre" class="btn btn-light">
                    </form>
                    <?php
                    $enlace = mysqli_connect("localhost", "root", "", "solarium");
                    $sql="SELECT id_proveedor,Nombre,Email,Pag FROM proveedor;";
                    $result=$enlace->query($sql);
                    while($fila=$result->fetch_assoc()){
                        echo "<tr data-id=".$fila['id_proveedor'].">";
                        echo "<td>".$fila['Nombre']."</td>";
                        echo "<td>".$fila['Email']."</td>";
                        echo "<td>".$fila['Pag']."</td>";
                        echo "<td><form action='elim_prove.php' method='post'>
                        <input type='hidden' value='".$fila['id_proveedor']."'name='text_1' readonly>
                        <input type='submit' value='Eliminar' name='btn_elim' class='btn btn-danger'>
                        </from></td>";                     
                    }
                    mysqli_close($enlace);?>     
                </tbody>
            </table>
            <!-- Bootstrap JavaScript Libraries -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>