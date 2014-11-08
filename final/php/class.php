<?php 

class conexion
{
	var $conexion;
	var $nombre;

	function __construct($nombre)
	{
		$this->nombre = $nombre;
		$this->conexion =  mysql_connect("localhost","root","");
		mysql_select_db($this->nombre) or die("no se puede selecionar la base de datos ");
		


	}
		
	function query($query)
	{
		$tabla =  mysql_query($query);

		if (!$tabla) 
			echo "Fallo la consulta";
		else
			return $tabla;

	}
	function desconectar()
	{
		mysql_close($this->conexion) or die("no cerro");
	}
}
?>