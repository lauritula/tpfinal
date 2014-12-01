<?php 
include "class.php";


$objConexion = new conexion;
$objConexion->conectar("tpfinal");
$contar= 0;

$unionTablas = "SELECT COUNT(*) from pasajero p 
			join reserva r on p.dni = r.dniPasajero
			join vuelos v on r.codVuelo = v.codVuelo
			join frecuencias f on v.codFrecuencia =  f.codFrecuencia
			join aeropuerto a on f.origen = a.codAeropuerto 
			join aeropuerto aDos on f.destino = aDos.codAeropuerto ";

	$asientosTomadosTabla = $objConexion->query("  $unionTablas
            where asiento is not null 
              group by r.codVuelo");
 while   ( $asientosTomados = mysql_fetch_row($asientosTomadosTabla) )
 {
 	$dato1[$contar]= $asientosTomados[0];
 	$contar++;
 }


 // grafico 
//$datos = array($dato1,$dato2);
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
$curva = new BarPlot($dato1);

//Agregar curva al grafico
$graph->Add($curva);
// generar el grafico desde el php
$graph->Stroke();

 ?>