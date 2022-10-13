<?php 
$con = mysqli_connect('localhost','root','','bakery');
$productos = mysqli_query($con,"SELECT * FROM productos");
$clientes = mysqli_query($con,"SELECT * FROM clientes");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="http://localhost/PROYECTO_BAKERY/css/formulario.css">
  <title>Registrar_venta</title>
</head>
<body>
  <h1>Registrar una venta</h1>
  <div class="container">
  <div class="row">
    <form action="../interfaz/venta.php">
            <button ><span>volver</span></button>
        </form>
    </div>
    <form action="../insert/insert_datos_ventas.php" method="POST" class="ojala">
          <div class="row">
        <div class="col-25">
          <label for="fname">cliente:</label>
        </div>
        <div class="col-75">
          <select class="input" name="cliente">
            <option value="">busque cliente</option>
            <?php
            while ($filas = mysqli_fetch_array($clientes)) { 
            echo "<option value=".$filas['id_cliente'].">".$filas['nombre_cliente']." -- ".$filas['id_cliente']."</option>";
            }mysqli_free_result($clientes);
            ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="fname">Digite el nombre del producto:</label>
        </div>
        <div class="col-75">
          <input type="text" name="producto[]" list="productos">
          <datalist id="productos">
            <option value="pan dulce"></option>
            <option value="pan salado"></option>
            <option value="pan crema"></option>
          </datalist>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Digite la cantidad del producto: </label>
        </div>
        <div class="col-75">
          <input type="text" class="input quantity" name="cantidad[]" placeholder="0"  id="quantity_1">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Digite el porcentaje de descuento: </label>
        </div>
        <div class="col-75">
          <input type="text" class="input" name="descuento" placeholder="200..." id="descuento">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Digite el precio por unidad: </label>
        </div>
        <div class="col-75">
          <input type="text" class="input  price" name="precio[]" id="price_1" placeholder="0"  step="0.001" >
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">precio total: </label>
        </div>
        <div class="col-75">
          <input type="text" class="input total" id="total_1" name="precio_total_unidad[]" step="0.001"><br><br>
        </div>
      </div>
       <div class="row">
        <div class="col-25">
          <label for="lname">estado: </label>
        </div>
        <div class="col-75">
         <select name="estado">
           <option value="0">seleccione estado</option>
           <option value="pagado">pagado</option>
           <option value="no pagado">no pagado</option>
         </select>
        </div>
      </div>
      <div id="tipos"></div>
      <div class="guardar"></div>
      <hr>
      <h1>totales</h1>
        <div class="row">
        <div class="col-25">
          <label for="lname">sub total: </label>
        </div>
        <input type="text" name="sub_total" id="Totalsub" class="input">
      </div>
       <div class="row">
        <div class="col-25">
          <label for="lname"> descuento: </label>
        </div>
        <input type="text" name="descuento_" id="totaldescuento" class="input">
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname"> total: </label>
        </div>
        <input type="text" name="total_por_pagar" id="Totalpago" class="input">
      </div>
      <hr>
       <div class="row">
        <button > <span>Enviar</span></button>
        <button class="boton" id="boton" ><span>agregar nueva venta</span></button>
      </div>
      <hr>
    </form>
  </div>
  <script type="text/javascript" src="http://localhost/PROYECTO_BAKERY/js/funciones.js"></script>
</body>
</html>
