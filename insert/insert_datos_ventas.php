<?php
$con = mysqli_connect('localhost','root','','bakery');
$cliente = $_POST['cliente'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$descuento = $_POST['descuento'];
$precio_unidad = $_POST['precio'];
$precio_total_unidad = $_POST['precio_total_unidad'];
$total_por_pagar = $_POST['total_por_pagar'];
$sub_total = $_POST['sub_total'];
$estado = $_POST['estado'];
$fecha_actual = date('y-m-d H:i:s');

function codAleatorio($length = 5) {
    return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
$id_factura  = codAleatorio();


for ($i=0; $i < count($producto); $i++){

$InserData =("INSERT INTO registro_ventas(id_cliente, nombre_producto, cantidad_producto, descuento, precio_unidad, precio_total_por_producto, total_por_pagar, fecha_hora_venta, estado, id_factura) VALUES ('".$cliente."','".$producto[$i]."','".$cantidad[$i]."','".$descuento."','".$precio_unidad[$i]."','".$precio_total_unidad[$i]."','".$total_por_pagar."','".$fecha_actual."','".$estado."','".$id_factura."')");
$resultadoInsertUser = mysqli_query($con, $InserData);
  
  }


require('../pdf/fpdf.php');
$fechaActual = date('y-m-d H:i:s');
$linea = "----------------------------------------------------------------------------------------------------------------";

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',30);
    // Título
    $this->Cell(30,10,'Bakery',0,1,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
}
$datos = mysqli_query($con,"SELECT *FROM registro_ventas WHERE id_factura = '$id_factura'");
$datos_ = mysqli_query($con,"SELECT *FROM clientes WHERE id_cliente = '$cliente'");
$fila_ = mysqli_fetch_array($datos_);
$fila = mysqli_fetch_array($datos);
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(80);
$pdf->Cell(30,10,'Factura ',0,1,'C',0);
$pdf->Cell(80);
$pdf->cell(30,10,$linea,0,1,'C',0);
$pdf->cell(80);
$pdf->cell(30,10,'codigo_factura '.$id_factura,0,1,'C',0);
$pdf->Cell(80);
$pdf->cell(30,10,"fecha y hora: ".$fechaActual,0,1,'C',0);
$pdf->cell(80);
$pdf->cell(30,10,'descuento',0,1,'C',0);
$pdf->cell(80);
$pdf->Cell(30,10,$fila['descuento']."%",0,1,'C',0);
$pdf->Cell(80);
$pdf->cell(30,10,$linea,0,1,'C',0);
$pdf->Cell(80);
$pdf->cell(30,10,'cliente '.$fila_['nombre_cliente'],0,1,'C',0);
$pdf->Cell(80);
$pdf->cell(30,10,'id '.$fila['id_cliente'],0,1,'C',0);
$pdf->Cell(80);
$pdf->cell(30,10,'celular: '.$fila_['celular_cliente'],0,1,'C',0);
$pdf->Cell(80);
$pdf->cell(30,10,'direccion: '.$fila_['direccion_cliente'],0,1,'C',0);
$pdf->Cell(80);
$pdf->cell(30,10,$linea,0,1,'C',0);
$pdf->cell(80);
$pdf->ln(10);
$pdf->Cell(30);
$pdf->cell(130,10,'registro venta',1,1,'C');
$pdf->Cell(30);
$pdf->cell(70,10,'productos',1,0,'C');
$pdf->cell(30,10,'cantidad',1,0,'C');
$pdf->cell(30,10,'precio_unidad',1,1,'C');
for ($i=0; $i < count($producto) ; $i++) { 
	$pdf->Cell(30);
	$pdf->Cell(70,10,$producto[$i],1,0,'C',0);
	$pdf->Cell(30,10,$cantidad[$i],1,0,'C',0);
	$pdf->Cell(30,10,"$".$precio_unidad[$i],1,1,'C',0);
	
}
$pdf->Cell(100);
$pdf->Cell(30,10,"sub_total",1,0,'C',0);
$pdf->Cell(30,10,"$".$sub_total,1,1,'C',0);
$pdf->Cell(100);
$pdf->Cell(30,10,"total",1,0,'C',0);
$pdf->Cell(30,10,"$".$fila['total_por_pagar'],1,0,'C',0);

$pdf->Output();

?>
