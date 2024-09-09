<!DOCTYPE html>
<html lang="es">

    <head>
            <title>Realizar compra</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <?php include ("header.php"); ?>
    </head>

  <body  class='msgbody' style='width: 100%'><a name="msgtop">

    </a><div id="msgwebcontainer" class="msgwebcontainer" direction="ltr"><div id="msp39_HeaderExternal" class="HeaderExternal_wp_outer"><div style="height:0px;width:0px;"> </div><div id="msp39_Header" class="Header_wp_outer"><div style="height:0px;width:0px;"> </div><div style="height:0px;width:0px;"> </div><div id="msp39_HeaderInternal" class="HeaderInternal_wp_outer" style="position:relative;"><header><div class="msgbody27001913"><div style="height:0px;width:0px;"> </div><div id="inc37_container1" class="inc37_container1_wp_outer"><div style="height:0px;width:0px;"> </div><div id="inc37_freehtml1" class="inc37_freehtml1_wp_outer"><div class="clear_div" style="clear:both;height:0px;"> </div></div><div class="clear_div" style="clear:both;height:0px;"> </div></div><div id="inc37_container7" class="inc37_container7_wp_outer"><div style="height:0px;width:0px;"> </div><div id="inc37_container2" class="inc37_container2_wp_outer"><div style="height:0px;width:0px;"> </div><div class="inc37_columns1_swp_outer_bg"><div id="inc37_columns1" class="inc37_columns1_wp_outer wp_columns stick-header"><div class="wp_column wp_first_col inc37_columns1_col_3"><div class="wp_bg inc37_columns1_col_bg_3" rel="inc37_container6"></div><div class="wp_column inc37_columns1_col_2"><div class="wp_bg inc37_columns1_col_bg_2" rel="inc37_container5"></div><div class="wp_column inc37_columns1_col_1"><div class="wp_bg inc37_columns1_col_bg_1" rel="inc37_container4"></div><div class="wp_column inc37_columns1_col_0"><div class="wp_bg inc37_columns1_col_bg_0" rel="inc37_container3"></div><div id="inc37_container3" class="wp_col_content inc37_columns1_col_box_0"><div style="height:0px;width:0px;"> </div><div id="inc37_logo1" class="inc37_logo1_wp_outer"><div style="height:100%"><a u="image" href="/" aria-label="Volver al inicio"><img src="https://tqpytokz.cdn.imgeng.in/media-adsa/static/4206/039.jpg" alt="SOLARIUM SISTEMAS DE ENERGÍA SOLAR" title="SOLARIUM SISTEMAS DE ENERGÍA SOLAR" style="max-width:100%;max-height:100%" /></a></div><div class="clear_div" style="clear:both;height:0px;"> </div></div><div class="clear_div" style="clear:both;height:0px;"> </div></div><div id="inc37_container4" class="wp_col_content inc37_columns1_col_box_1"><div style="height:0px;width:0px;"> </div><div id="inc37_menucomp2" class="inc37_menucomp2_wp_outer efecto-5"><nav role="navigation"><ul id="ul_inc37_menu_menucomp2" class="mlhmenu inc37_menucomp2" style=""><li id="li_inc37_menu_menucomp20" style=";">

    <a role="menuitem" onclick="if(scroolSmooth(this,1000)) return false;;window.open('/#inicio','_self'); return false;" href="index.php" style="float: none;" class="inc37_menucomp2_item inc37_menucomp2_selected" aria-label="Enlace a la página INICIO">INICIO</a></li><li id="li_inc37_menu_menucomp21" style=";">
    <a role="menuitem" onclick="if(scroolSmooth(this,1000)) return false;;window.open('/#productos-y-servicios','_self'); return false;" href="productos.php" style="float: none;" class="inc37_menucomp2_item" aria-label="Enlace a la página PRODUCTOS Y SERVICIOS">PRODUCTOS</a></li><li id="li_inc37_menu_menucomp22" style=";">
    <a role="menuitem" onclick="if(scroolSmooth(this,1000)) return false;;window.open('login.php','_self'); return false;" href="login.php" style="float: none;" class="inc37_menucomp2_item" aria-label="Enlace a la página CONTACTO">ADMINISTRADOR</a></li></ul></nav><div class="clear_div" style="clear:both;height:0px;"> </div></div><div id="inc37_freehtml2" class="inc37_freehtml2_wp_outer">
    <div class="clear_div" style="clear:both;height:0px;"> </div></div></div><div id="inc37_container5" class="wp_col_content inc37_columns1_col_box_2"><div style="height:0px;width:0px;"> </div></div><div class="clear_div" style="clear:both;height:0px;"> </div></div></div></div></div></div><div style="clear:both;height:0px;width:0px;"> </div></div></div>

    <div id="msp39_MainColumns" class="MainColumns_wp_outer wp_columns" name="content-top"><div class="wp_column wp_first_col MainColumns_col_0"><div class="page55_container8_swp_outer_bg paralaxbg" data-paralaxbg-speed="2"><div id="page55_container8" class="container8_wp_outer toper" name="inicio"><a name="inicio_old" aria-label=""></a>

        <h1>Productos</h1>
        <br><br>
        <table class="table table-striped table-dark">
          <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Proveedor</th>
                  <th>Categoria</th>
              </tr>
          </thead>    
          <tbody>
              <?php
              $enlace = mysqli_connect("localhost", "root", "", "solarium");
              $sql="SELECT A.id_producto AS id,A.Nombre as Nombre,A.Precio as precio,B.Nombre as proveedor,C.Nombre as categoria FROM producto A INNER JOIN proveedor B ON B.id_proveedor=A.id_proveedor
              INNER JOIN categoria C ON C.id_categoria=A.id_categoria;";
              $result=$enlace->query($sql);
              while($fila=$result->fetch_assoc()){
                  echo "<tr data-id=".$fila['id'].">";
                  echo "<td>".$fila['Nombre']."</td>";
                  echo "<td>".$fila['precio']."</td>";
                  echo "<td>".$fila['proveedor']."</td>";
                  echo "<td>".$fila['categoria']."</td>";                 
              } 
              mysqli_close($enlace);?>     
          </tbody>
        </table>  
      <!-- Bootstrap JavaScript Libraries -->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>