<?php // content="text/plain; charset=utf-8"
include "class.php";
//http://davinci.crg.es/mpc/jpgraph/docs/html/8101Usingtheautomaticdatetimescale.html


$objConexion = new conexion;
$objConexion->conectar("tpfinal");

//consulta
	$reservasNoActivasTabla = $objConexion->query("SELECT COUNT(*) FROM reserva WHERE estado= 0 and week(fechaReserva) = WEEK(date(now())) ");
 while   ( $reservasNoActivas = mysql_fetch_row($reservasNoActivasTabla) )
 {
 	$dato1= $reservasNoActivas[0];
 }
$reservasNoPagasTabla = $objConexion->query("SELECT COUNT(*) FROM reserva WHERE fechaPago is not null and week(fechaReserva) = WEEK(date(now())) ");
 while   ( $reservasNoPagas = mysql_fetch_row($reservasNoPagasTabla) )
 {
 	$dato2= $reservasNoPagas[0];
 }
// grafico 
$datos = array($dato1,$dato2);
$ancho = 600;
$alto=250;
//crear la instancia del objeto graph definiendo ancho alto y tipo de escala
$graph = new Graph($ancho,$alto,"auto");
//especificar la escala de valores de los ejes 
//$graph-> SetScale('textlin'); // texto
//$graph->SetScale('datlin');//date time
$graph->SetScale('intint');//date time
//crear curva
//$curva = new LinePlot($datosY,$datosX); // se establecen x e y 
//$curva = new LinePlot($datosY); // si no se agreega otro el factor x es la suma de los elementos
$curva = new BarPlot($datos);

//Agregar curva al grafico
$graph->Add($curva);
// generar el grafico desde el php
$graph->Stroke();

?>

