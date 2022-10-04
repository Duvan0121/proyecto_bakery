<?php 
$con = mysqli_connect('localhost','root','','bakery');
$mostrar = mysqli_query($con,"SELECT * FROM productos");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="http://localhost/version1/css/formulario.css">
  <title>Registrar_venta</title>
</head>
<body>
  <h1>Registrar una venta</h1>
  <div class="container">
    <div class="row" >
      <button class="boton" id="boton" ><span>agregar nueva venta</span></button>
    </div>
    <form action="#" class="ojala">

      <div class="row">
        <div class="col-25">
          <label for="fname">Digite el nombre del producto:</label>
        </div>
        <div class="col-75">
          <select class="input">
            <option value="">Seleccione producto</option>
            <?php
            while ($filas = mysqli_fetch_array($mostrar)) { 
            echo "<option value=".$filas['producto'].">".$filas['producto']."</option>";
            }mysqli_free_result($mostrar);
            ?>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Digite la cantidad del producto: </label>
        </div>
        <div class="col-75">
          <input type="text" class="input" name="can" placeholder="0" id="quantity_1" >
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Digite el nombre del vendedor: </label>
        </div>
        <div class="col-75">
          <input type="text" class="input"  placeholder="vargas...">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Digite el nombre del cliente: </label>
        </div>
        <div class="col-75">
          <input type="text" class="input" placeholder="Nataly...">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Digite el porcentaje de descuento: </label>
        </div>
        <div class="col-75">
          <input type="text" class="input"  placeholder="200..." id="descuento">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Digite el precio por unidad: </label>
        </div>
        <div class="col-75">
          <input type="text" class="input" name="pre" id="price_1" placeholder="0"  step="0.001" >
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">precio total: </label>
        </div>
        <div class="col-75">
          <input type="text" class="input" id="total_1" step="0.001"><br><br>
        </div>
      </div>
      <div id="tipos"></div>
      <div class="guardar"></div>
      <hr>
      <div class="row">
        <div class="col-25">
          <label for="lname">sub total: </label>
        </div>
        <div class="col-75">
          <input type="text" class="input"   id="Totalsub">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">lo que se descuenta: </label>
        </div>
        <div class="col-75">
          <input type="text" class="input"   id="totaldescuento">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">total a pagar: </label>
        </div>
        <div class="col-75">
          <input type="text" class="input"  id="Totalpago">
        </div>
      </div>
      <hr>
      <div class="row">
        <button> <span>Modificar</span></button>
        <button> <span>Enviar</span></button>
      </div>

    </form>
  </div>
  <script type="text/javascript" src="../js/funciones.js"></script>
 
</body>
</html>