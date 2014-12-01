<?php // content="text/plain; charset=utf-8"
include "class.php";
//http://davinci.crg.es/mpc/jpgraph/docs/html/8101Usingtheautomaticdatetimescale.html


$objConexion = new conexion;
$objConexion->conectar("tpfinal");

//consulta
$contar = 0;
//$objConexion->query(""); 
$unionTablas = "select * from pasajero p 
			join reserva r on p.dni = r.dniPasajero
			join vuelos v on r.codVuelo = v.codVuelo
			join frecuencias f on v.codFrecuencia =  f.codFrecuencia
			join aeropuerto a on f.origen = a.codAeropuerto 
			join aeropuerto aDos on f.destino = aDos.codAeropuerto"; // une las tablas

/*$reservasActivasTabla = $objConexion->query("$unionTablas where r.estado = 1"); // trae los vuelos activos 
while ( $reservasActivas  = mysql_fetch_row($reservasActivasTabla)) 
	{ 	
		$datosX[$contar] =  $reservasActivas[0];//dni
		$datosY[$contar] =   $reservasActivas[13];// estado
		$contar++;
	}
	//pasajes  vendidos
	$pasajesVendidosTabla =  $objConexion->query("select * from reserva where fechaPago is not null");
	$contar= 0;
	while ( $pasajesVendidos  = mysql_fetch_row($pasajesVendidosTabla)) 
	{
		$datosY[$contar] =  $pasajesVendidos[5]; // importe 
		$datosX[$contar] =  $pasajesVendidos[4]; // fecha de compra
		$contar++;
	}*/
	$reservasNoActivasTabla = $objConexion->query("SELECT COUNT(*) FROM reserva WHERE estado = 0");
 while   ( $reservasNoActivas = mysql_fetch_row($reservasNoActivasTabla))
 {
 	$dato1= $reservasNoActivas[0];
 }

// grafico 
$datos = array($dato1);
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

