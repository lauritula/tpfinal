<?php 

if(isset($_REQUEST))
{

	mysql_connect("localhost","root","");
	mysql_select_db("tpfinal");
	error_reporting(E_ALL && ~E_NOTICE);

$data=$_POST['1']; // captura el numero de reserva con el numero de asiento
$codigoReserva = substr($data, 0, 6 ); // solo numero reserva
$asiento= substr($data, 6);; // solo numero asiento
echo "$codigoReserva \n";
echo "$asiento";

$sql="UPDATE reserva SET asiento='$asiento' where codigoReserva = '$codigoReserva'";
$result=mysql_query($sql);

if($result){
	echo "You have been successfully subscribed.";
}
}

?>