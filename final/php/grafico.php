<?php // content="text/plain; charset=utf-8"
include "class.php";
$datos = array(5,2,12,2,20,8,5,6,15,5,2,25,8,10);
$ancho = 600;
$alto=250;
//crear la instancia del objeto graph definiendo ancho alto y tipo de escala
$graph = new Graph($ancho,$alto,"auto");
//especificar la escala de valores de los ejes 
$graph-> SetScale('intint');
//crear curva
$curva = new LinePlot($datos);
//Agregar curva al grafico
$graph->Add($curva);
// generar el grafico desde el php
$graph->Stroke();

?>

