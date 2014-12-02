<?php 
include "class.php";


$objConexion = new conexion;
$objConexion->conectar("tpfinal");

	$reservasVendidasPrimeraTabla = $objConexion->query("SELECT COUNT(*) FROM reserva WHERE categoria='primera'and fechaPago is not null and week(fechaReserva) = WEEK(date(now()))");
 while   ( $reservasVendidasPrimera = mysql_fetch_row($reservasVendidasPrimeraTabla) )
 {
 	$dato1= $reservasVendidasPrimera[0];
 }
 	$reservasVendidasEconomyTabla = $objConexion->query("SELECT COUNT(*) FROM reserva WHERE categoria='economy'and fechaPago is not null and week(fechaReserva) = WEEK(date(now()))");
 while   ( $reservasVendidasEconomy = mysql_fetch_row($reservasVendidasEconomyTabla) )
 {
 	$dato2= $reservasVendidasEconomy[0];
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
$graph->SetColor('black');
$graph->tabtitle->Set('Reservas por categoria');
$a=array('Primera', 'Economy');
$graph->xaxis->SetTickLabels($a);
$graph->xaxis->title->Set('Categoria de pasaje');
$graph->yaxis->title->Set('Cantidad (u)');
//crear curva
//$curva = new LinePlot($datosY,$datosX); // se establecen x e y 
//$curva = new LinePlot($datosY); // si no se agreega otro el factor x es la suma de los elementos
$curva = new BarPlot($datos);
$curva->setWidth(30);

//Agregar curva al grafico
$graph->Add($curva);
// generar el grafico desde el php
$graph->Stroke();
$objConexion->desconectar();
 ?>