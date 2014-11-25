<?php 

class conexion
{
	var $conexion;
	var $nombre;

	function conectar($nombre)
	{
		$this->nombre = $nombre;
		$this->conexion =  mysql_connect("localhost","root","");
		mysql_select_db($this->nombre) or die("no se puede selecionar la base de datos ");
		


	}			
	function query($query)
	{
		$tabla =  mysql_query($query);

		if (!$tabla) 
			echo "Fallo la consulta $query";
		else
			return $tabla;

	}
	function desconectar()
	{
		mysql_close($this->conexion) or die("no cerro");
	}
}

class pasajero 
{
	var $dni;
	var $nombre;
	var $email;
	var $fecha;
	function __construct($dni,$nombre,$email,$fecha)
	{	
		$this->dni = $dni;
		$this->nombre = $nombre;
		$this->email = $email;
		$this->fecha = $fecha;
		
	}
	function guardarPasajero() 
	{
		$conectar = new conexion();
		$conectar->query("INSERT INTO pasajero (dni, nombre, email, fecha) VALUES ('$this->dni', '$this->nombre', '$this->email', '$this->fecha')");
	}
	
}

class reserva
{
	var $codigoReserva;
	var $datosReserva;
	var $imprimirDatos;
	var $hoy;
	var $cantidadAsientos;

	function __construct($codigoReserva)
	{


		$this->codigoReserva  = $codigoReserva;
		date_default_timezone_set (  'America/Argentina/Buenos_Aires' );
		$this->hoy = date('Y-m-d');
	}

	function guardarReserva($dni,$codigoVuelo,$monto,$categoria)
	{
		$conectar = new conexion();
		
		$conectar->query("INSERT INTO reserva (codigoReserva,dniPasajero,codVuelo,monto,categoria) VALUES ('$this->codigoReserva',$dni,'$codigoVuelo',$monto,'$categoria')");

	}
	function datosReserva()
	{
		
		$conectar = new conexion();		
		$hs24 = date('Y-m-d',strtotime($this->hoy . "1 days "));
		$hs48 = date('Y-m-d',strtotime($this->hoy . "2 days "));

		$tabla = $conectar->query("select * from pasajero p 
			join reserva r on p.dni = r.dniPasajero
			join vuelos v on r.codVuelo = v.codVuelo
			join frecuencias f on v.codFrecuencia =  f.codFrecuencia
			join aeropuerto a on f.origen = a.codAeropuerto 
			join aeropuerto aDos on f.destino = aDos.codAeropuerto
			where r.codigoReserva  = '$this->codigoReserva'");
		$this->datosReserva =  mysql_fetch_row($tabla);

		$vueloPerdido = "";
		$disabledButtonCheckIn = "<a href='checkIn.php'><button type='button' disabled='disabled' class=' col-md-12 btn btn-warning  sinpadding'>CHECK-IN</button></a>";//deshablitado
		$disabledButtonPago = "<input name='pagar'  value='PAGAR VUELO' type='submit' class=' col-md-12 btn btn-success sinpadding '>";// habilitado

		if ($this->datosReserva[8] != NULL &&($this->hoy == $this->datosReserva[14] ||  $hs48 == $this->datosReserva[14] || $hs24 == $this->datosReserva[14] )) 
		{// se habilita el boton
		$disabledButtonCheckIn = "<input type='submit' class=' col-md-6 btn btn-warning sinpadding' value='CHECK-IN'>";
		}
		if ($this->hoy >= $this->datosReserva[14]) 
			{ // se deshabilita el boton
				$disabledButtonPago ="<input disabled='disabled' value='PAGAR VUELO'   type='submit' class=' col-md-12 btn btn-success sinpadding '>";
			}
			if ($this->hoy > $this->datosReserva[14])
		{// se borran los dos botones
			$disabledButtonCheckIn = ""; 
			$disabledButtonPago = "";
			$vueloPerdido = "<button  type='button' disabled='disabled' class=' col-md-12 btn btn-danger '>¡el vuelo ya partio! </button>";
		}	
		if ($this->datosReserva[7]) // en caso de encontrarse en espera
		{// se borran los dos botones
			$disabledButtonCheckIn = ""; 
			$disabledButtonPago = "";
			$vueloPerdido = "<button  type='button' disabled='disabled' class=' col-md-12 btn btn-danger '>¡Aun no hay vacantes! </button>";
		}	

		$this->imprimirDatos = "
		<div class='well create-box'>
		<legend>Reserva     ".$this->datosReserva[4]."</legend>
		<div  id='the-basics' >
		<div class='form-group ' >
		<span class='col-md-6'>Vuelo Numero: ".$this->datosReserva[13]."</span>
		<span class='col-md-6'>Fecha:  ".$this->datosReserva[14]."</span>
		</div>
		<div class='form-group ' >
		<span>Origen:  ".$this->datosReserva[25] ."/". $this->datosReserva[26] ."/".  $this->datosReserva[27]."</span>
		</div>
		<div class='form-group ' >
		<span>destino:  ".$this->datosReserva[29]  ."/". $this->datosReserva[30] ."/".  $this->datosReserva[31]." </span>
		</div>
		<div class='form-group ' >
		<span>Nombre:".$this->datosReserva[1]."</span>
		</div>
		<div class='form-group ' >
		<span>Documento:".$this->datosReserva[0]."</span>
		</div>
		<div class='form-group ' >
		<span>E-mail:  ".$this->datosReserva[2]."</span>
		</div>
		<div class='form-group ' >
		<span>Categoria:  ".$this->datosReserva[10]."</span>
		</div>
		<div class='form-group ' >
		
		<span>Precio:  $".$this->datosReserva[9]."</span>
		</div>
		".$vueloPerdido."
		<div class=' col-md-12 sinpadding'>
		<form action='formularioPague.php' class=' col-md-6 sinpadding' method='post' role='search'>
		<input type='hidden' id='tipoAvion'  NAME='tipoAvion' value='".$this->datosReserva[20]."' /> 
		<input type='hidden' id='codigoReserva'  NAME='codigoReserva' value='".$this->codigoReserva."' /> 
		
		".$disabledButtonPago."		
		</form>
		<form action='checkIn.php' method='post'class=' col-md-6 sinpadding' role='search'>
		<input type='hidden' id='tipoAvion'  NAME='tipoAvion' value='".$this->datosReserva[20]."' /> 
		<input type='hidden' id='codigoReserva'  NAME='codigoReserva' value='".$this->codigoReserva."' /> 
		".$disabledButtonCheckIn."		
		</form>

		</div>
		</div>";
	/*	$tabla = conexion::query("select count(codigoReserva) cantidad from reserva where codVuelo = '".$this->datosReserva[13]."' and categoria = '".$this->datosReserva[10]. "'");
		$codigo = mysql_fetch_row($tabla);
  		$this->cantidadAsientos = $codigo[0];*/
	}
	function buscarReserva()
	{
	$conectar = new conexion();

		$tabla=$conectar->query("select codigoReserva from reserva where codigoReserva='$this->codigoReserva' ");
		$codigo = mysql_fetch_assoc($tabla);
		$this->codigoReserva =  $codigo['codigoReserva'];
	}
	function contarReservas()
	{
		$tabla = conexion::query("select count(codigoReserva) cantidad from reserva where codVuelo = '".$this->datosReserva[13]."' and categoria = '".$this->datosReserva[10]. "'");
		$codigo = mysql_fetch_row($tabla);
  		$this->cantidadAsientos = $codigo[0];
	}
	function eliminarReserva()
	{
		conexion::query("DELETE FROM reserva WHERE codigoReserva = '$this->codigoReserva'");
	}
	function colaEspera()
	{
		conexion::query("");
	}
}

class vuelo{
	var $codigoVuelo;
	var $fechaVuelo;
	var $codigoFrecuencia;
	var $modeloAvion;
	
	function __construct($fecha,$codigoFrecuencia,$tipoAvion)
	{	
		$conectar = new conexion();
		$crearVuelo = 1;
		$this->codigoVuelo = chr(rand(65,90)) . chr(rand(65,90)) . intval( "0" . rand(1,9) . rand(0,9)) . chr(rand(65,90)) . chr(rand(65,90)); 
		$this->fechaVuelo = date('Y-m-d',strtotime($fecha));
		$this->codigoFrecuencia = $codigoFrecuencia;
	//die("$fecha , $this->fechaVuelo $this->codigoVuelo $this->codigoFrecuencia ");
		$vueloExistente = $conectar->query("SELECT * FROM vuelos WHERE 1 "); // busca los vuelos existentes
		while ($fila =  mysql_fetch_row($vueloExistente)) 
		{
			if ($this->fechaVuelo == $fila[1] && $this->codigoFrecuencia == $fila[2] )
			{
				$crearVuelo = 0;
				$this->codigoVuelo = $fila[0];

			}


		}
		
		if ($crearVuelo == 1) {


			$resultado = $conectar->query("SELECT codAvion FROM avion WHERE tipoAvion  = '$tipoAvion' ");
			while ($fila =  mysql_fetch_row($resultado)) {
			$this->modeloAvion  =$fila[0]; // busca el modelo de avion segun su tipo

		}
		$conectar->query("INSERT INTO vuelos (codVuelo,fechaVuelo,codFrecuencia,codAvion) VALUES ('$this->codigoVuelo','$this->fechaVuelo',$this->codigoFrecuencia,'$this->modeloAvion')");
	}
}
}

class planoLugares{
	var $economy; // cantidad de lugares 
	var $primera; 
	var $datosTipoAvion;
	var $posicionPrimera=array();
	var $posicionEconomy = array(array());
	var $contadorPrimera=0;
	var $contadorEconomy = 0;
	function __construct($tipoAvion)
	{	
		switch ($tipoAvion)
		{
			case '1':
			$tabla = conexion::query("select * from tipo where tipoAvion=$tipoAvion");
			break;
			
			case '2':
			$tabla = conexion::query("select * from tipo where tipoAvion=$tipoAvion");
			break;
			
			case '3':
			$tabla = conexion::query("select * from tipo where tipoAvion=$tipoAvion");
			break;
			
			case '4':
			$tabla = conexion::query("select * from tipo where tipoAvion=$tipoAvion");
			break;
			default:
				# code...
			break;
		}

		$this->datosTipoAvion =  mysql_fetch_assoc($tabla);
		
	}

	
	function plano($codigoReserva)
	{	
		$objReserva = new reserva($codigoReserva);
		$objReserva->buscarReserva();
		$objReserva->datosReserva();
		$this->contadorPrimera = 1;
		$this->contadorEconomy = 1;
		
		if ($objReserva->datosReserva[10]=="Primera") {//si el cliente tiene pasaje primera 
			$asiento = "class='btn-success'><img src='../imagenes/asientos sin fondo blanco/asiento6.png '> ";
		}
		else{// cuando estan deshabilitados 
			$asiento = "class = '' disabled='disabled'><img src='../imagenes/asientos sin fondo blanco/asiento4.png '> ";	
		}
		

		if ($this->datosTipoAvion['primera'] != 0) 
		{
			$this->primera = "<table class='table table-condensed'>";
			for ($i=0; $i < $this->datosTipoAvion['primeraFilas'] ; $i++) 
			{ 
				$this->primera .= "<tr>";
				for ($j=0; $j <$this->datosTipoAvion['primeraCols'] ; $j++)
				{ 
					
					$this->primera .= "<td><button name='1' value='".$codigoReserva."P".$this->contadorPrimera."'".$asiento .$this->contadorPrimera."</button></td>";
					$this->posicionPrimera[$i][$j] = $this->contadorPrimera++;
				}
				$this->primera .= "</tr>";
			}	
			$this->primera .= "</table>";
			
			
		}
		if ($objReserva->datosReserva[10]=="Economy") {//si el cliente tiene pasaje Economy 
			$asiento = "class='btn-success' ><img src='../imagenes/asientos sin fondo blanco/asiento6.png '> ";
		} 
		else{// cuando estan dehabilidatos 
			$asiento = "class = '' disabled='disabled'><img src='../imagenes/asientos sin fondo blanco/asiento4.png '> ";
		}
//echo $this->posicionPrimera[2][1];
		$this->economy = "<table class='table table-condensed planilla'>";
		for ($i=0; $i <$this->datosTipoAvion['economyFilas'] ; $i++) 
		{ 
			$this->economy .= "<tr class='plano'>";
			for ($j=0; $j <$this->datosTipoAvion['economyCols'] ; $j++)
			{ 
				
				$this->economy .= "<td class='butaca'><button name='1'value='".$codigoReserva."E".$this->contadorEconomy."'".$asiento.$this->contadorEconomy."</button></td>";
				$this->posicionEconomy[$i][$j]=$this->contadorEconomy++;
			}
			$this->economy .= "</tr>";
		}	
		$this->economy .= "</table>";

	}

}
?>