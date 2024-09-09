<h1>Productos</h1>
      <br><br>
      <form action="Agre_prove.php">
            <input type="submit" value="Agregar" name="btn_agre" class="btn btn-light">
        </form>
      <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Proveedor</th>
                <th>Categoria</th>
                <th>Imagen</th>
                <th class="text-danger"></th>
            </tr>
        </thead>    
        <tbody>
            <?php
            $enlace = mysqli_connect("localhost", "root", "", "solarium");
            $sql="SELECT A.id_producto AS id,A.Nombre as Nombre,A.Precio as precio,B.Nombre as proveedor,C.Nombre as categoria,A.Imagen as imagen FROM producto A INNER JOIN proveedor B ON B.id_proveedor=A.id_proveedor
            INNER JOIN categoria C ON C.id_categoria=A.id_categoria;";
            $result=$enlace->query($sql);
            while($fila=$result->fetch_assoc()){
                echo "<tr data-id=".$fila['id'].">";
                echo "<td>".$fila['Nombre']."</td>";
                echo "<td>".$fila['precio']."</td>";
                echo "<td>".$fila['proveedor']."</td>";
                echo "<td>".$fila['categoria']."</td>";
                echo "<td><img width='100' src='".$fila['categoria']."'></td>";
                echo "<td><form action='elim_product.php' method='post'>
                <input type='hidden' value='".$fila['id']."'name='text_2' readonly>
                <input type='submit' value='Eliminar' name='btn_elim' class='btn btn-danger'>
                </from></td>";                  
            } 
            mysqli_close($enlace);?>     
        </tbody>
      </table>  