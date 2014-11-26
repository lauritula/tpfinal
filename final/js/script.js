var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substrRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        // the typeahead jQuery plugin expects suggestions to a
        // JavaScript object, refer to typeahead docs for more info
        matches.push({ value: str });
      }
    });

    cb(matches);
  };
};

var states = ['Aeropuerto Comodoro Pierrestegui, Concordia, Entre Ríos (SAAC)', 
'Aeropuerto de Junín, Junín, Buenos Aires (SAAJ)', 
'Aeropuerto Isla Martín García, Isla Martín García, Buenos Aires (SAAK)', 
'Aeropuerto General Justo José de Urquiza, Paraná, Entre Ríos (SAAP)', 
'Aeropuerto Internacional Rosario Islas Malvinas, Rosario, Santa Fe (SAAR)', 
'Aeropuerto de Villaguay, Villaguay, Entre Ríos (SAAU)', 
'Aeropuerto de Sauce Viejo, Sauce Viejo, Santa Fe (SAAV)', 
'Aeroparque Jorge Newbery, Buenos Aires, CABA (SABE)','Aeropuerto La Cumbre, La Cumbre, Córdoba (SACC)',
'Aeropuerto Internacional Ingeniero Ambrosio Taravella, Córdoba, Córdoba (SACO)','Aeropuerto Chepes, Chepes, La Rioja (SACP)',
'Aeropuerto Gobernador Gordillo, Chamical, La Rioja (SACT)', 'Aeródromo de Don Torcuato, Don Torcuato, Buenos Aires (SADD)', 
'Aeropuerto Internacional de San Fernando, San Fernando, Buenos Aires (SADF)', 
'Aeropuerto Mariano Moreno, José C. Paz, Buenos Aires (SADJ)', 
'Aeropuerto de La Plata, La Plata, Buenos Aires (SADL)', 'Aeropuerto de Morón, Morón, Buenos Aires (SADM)', 
'Aeródromo de Campo de Mayo, Campo de Mayo, Buenos Aires (SADO)', 'Aeropuerto El Palomar, El Palomar, Buenos Aires (SADP)', 
'Aeropuerto de San Justo, San Justo, Buenos Aires (SADS)', 'Aeródromo Juan Domingo Perón, Miramar, Buenos Aires (SAEM)', 
'Aeropuerto Internacional Ministro Pistarini, Ezeiza, Buenos Aires (SAEZ)', 
'Aeropuerto de Sunchales, Sunchales, Santa Fe (SAFS)', 'Aeropuerto de Caviahue, Caviahue, Neuquén (SAHE)', 
'Aeropuerto de General Roca, General Roca, Rio Negro (SAHR)', 'Aeropuerto de Zapala, Zapala, Neuquén (SAHZ)', 
'Aeropuerto de General Alvear, General Alvear, Mendoza (SAMA)', 
'Aeropuerto Internacional El Plumerillo, Mendoza, Mendoza (SAME)', 
'Aeropuerto Internacional Comodoro Ricardo Salomón, Malargüe, Mendoza (SAMM)', 
'Aeropuerto Internacional Suboficial Ayudante Santiago Germano, San Rafael, Mendoza (SAMR)', 
'Aeropuerto Coronel Felipe Varela, San Fernando del Valle de Cata, Catamarca (SANC)', 
'Aeropuerto Vicecomodoro Ángel de la Paz Aragonés, Santiago del Estero, Santiago del Estero (SANE)', 
'Aeropuerto Capitán Vicente Almandos Amonacide, La Rioja, La Rioja (SANL)', 'Aeropuerto Chilecito, Chilecito, La Rioja (SANO)', 
'Aeropuerto Internacional Termas de Río Hondo, Termas de Río Hondo, Santiago del Estero (SANR)', 
'Aeropuerto Internacional Teniente General Benjamín Matienzo, San Miguel de Tucumán, Tucumán (SANT)', 
'Aeropuerto Domingo Faustino Sarmiento, San Juan, San Juan (SANU)', 'Aeropuerto Ceres, Ceres, Santa Fe (SANW)', 
'Aeropuerto de Río Cuarto, Río Cuarto, Córdoba (SAOC)', 'Aeropuerto de Villa Dolores, Villa Dolores, Córdoba (SAOD)', 
'Aeródromo de Laboulaye, Laboulaye, Córdoba (SAOL)', 'Aeropuerto de Villa Reynolds, Villa Reynolds, San Luis (SAOR)',
'Aeropuerto Internacional Valle del Conlara, Merlo, San Luis (SAOS)', 
'Aeropuerto Brigadier Mayor Cesar Raúl Ojeda, San Luis, San Luis (SAOU)', 
'Aeropuerto Internacional Doctor Fernando Piragine Niveyro, Corrientes, Corrientes (SARC)', 
'Aeropuerto Internacional de Resistencia, Resistencia, Chaco (SARE)', 
'Aeropuerto Internacional de Formosa, Formosa, Formosa (SARF)', 
'Aeropuerto Internacional de Puerto Iguazú, Puerto Iguazú, Misiones (SARI)', 
'Aeropuerto Internacional de Paso de los Libres, Paso de los Libres, Corrientes (SARL)', 
'Aeropuerto de Monte Caseros, Monte Caseros, Corrientes (SARM)', 
'Aeropuerto Internacional Libertador General José de San Martín, Posadas, Misiones (SARP)', 
'Aeropuerto Internacional Martín Miguel de Güemes, Salta, Salta (SASA)', 
'Aeropuerto Internacional Gobernador Horacio Guzmán, Perico, Jujuy (SASJ)', 
'Aero Club Orán, San Ramón de la Nueva Orán, Salta (SASO)', 
'Aeropuerto de Tartagal, Tartagal, Salta (SAST)', 
'Aeropuerto Clorinda, Clorinda, Formosa (SATC)', 
'Aeródromo Alferez Armando Rodríguez, Las Lomitas, Formosa (SATK)', 
'Aeropuerto Daniel Jurkic, Reconquista, Santa Fe (SATR)', 
'Aeropuerto de Curuzú Cuatiá, Curuzú Cuatiá, Corrientes (SATU)', 
'Aeropuerto de El Bolson, El Bolsón, Rio Negro (SAVB)', 
'Aeropuerto Internacional General Enrique Mosconi, Comodoro Rivadavia, Chubut (SAVC)', 
'Aeropuerto Brigadier General Antonio Parodi, Esquel, Chubut (SAVE)', 
'Aeropuerto Las Heras, Las Heras, Santa Cruz (SAVH)', 
'Aeropuerto de Ingeniero Jacobacci, Ingeniero Jacobacci, Río Negro (SAVJ)', 
'Aeropuerto Alto Río Senguer, Alto Río Senguer, Chubut (SAVR)', 
'Aeropuerto Almirante Marco Andrés Zar, Trelew, Chubut (SAVT)', 
'Aeropuerto Gobernador Edgardo Castello, Viedma, Río Negro (SAVV)', 
'Aeropuerto El Tehuelche, Puerto Madryn, Chubut (SAVY)', 
'Aeropuerto de Lago Argentino (Cerrado), El Calafate, Santa Cruz (SAWA)', 
'Aeropuerto Comandante Armando Tola, El Calafate, Santa Cruz (SAWC)', 
'Aeropuerto Puerto Deseado, Puerto Deseado, Santa Cruz (SAWD)', 
'Aeropuerto Internacional Gob. Ramón Trejo Noel, Río Grande, Tierra del Fuego (SAWE)', 
'Aeropuerto Internacional Piloto Civil Norberto Fernández, Río Gallegos, Santa Cruz (SAWG)', 
'Aeropuerto de Ushuaia, Ushuaia, Tierra del Fuego (SAWH)', 
'Aeropuerto Capitán José Daniel Vázquez, Puerto San Julián, Santa Cruz (SAWJ)', 
'Aeropuerto Perito Moreno, Perito Moreno, Santa Cruz (SAWP)', 
'Aeropuerto Río Turbio, Río Turbio, Santa Cruz (SAWT)', 
'Aeropuerto de Puerto Santa Cruz, Puerto Santa Cruz, Santa Cruz (SAWU)', 
'Aeropuerto de Azul, Azul, Buenos Aires (SAZA)', 
'Aeropuerto Comandante Espora, Bahía Blanca, Buenos Aires (SAZB)', 
'Aeropuerto Brigadier Hector Eduardo Ruiz, Coronel Suárez, Buenos Aires (SAZC)', 
'Aeródromo de Dolores, Dolores, Buenos Aires (SAZD)', 
'Aeropuerto de Olavarría, Olavarría, Buenos Aires (SAZF)', 
'Aeropuerto de General Pico, General Pico, La Pampa (SAZG)', 
'Aeropuerto Municipal Primer Teniente Héctor Ricardo Volponi, Tres Arroyos, Buenos Aires (SAZH)', 
'Aeropuerto de Bolívar, Bolívar, Buenos Aires (SAZI)', 
'Aeropuerto de Santa Teresita, Santa Teresita, Buenos Aires (SAZL)', 
'Aeropuerto Internacional Astor Piazolla, Mar del Plata, Buenos Aires (SAZM)', 
'Aeropuerto Internacional Presidente Perón, Neuquén, Neuquén (SAZN)', 
'Aeropuerto Edgardo Hugo Yelpo, Necochea, Buenos Aires (SAZO)', 
'Aeropuerto Comodoro P. Zanni, Pehuajó, Buenos Aires (SAZP)', 
'Aeropuerto de Santa Rosa, Santa Rosa, La Pampa (SAZR)', 
'Aeropuerto Internacional Teniente Luis Candelaria, Bariloche, Río Negro (SAZS)', 
'Aeropuerto de Tandil, Tandil, Buenos Aires (SAZT)', 
'Aeropuerto de Villa Gesell, Villa Gesell, Buenos Aires (SAZV)', 
'Aeropuerto de Cutral-Co, Cutral-Co, Neuquén (SAZW)', 
'Aeropuerto Aviador Carlos Campos, San Martín de los Andes, Neuquén (SAZY)', 
];

$('#the-basics .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'states',
  displayKey: 'value',
  source: substringMatcher(states)
  //remote: '/search.php?query=%QUERY'//
});
/*CALENDARIO */
$('.input-group.nacimiento').datepicker({
  format: "yyyy-mm-dd",
  language: "es",  
  endDate: "today",
  startView: 2, 

});
$('.input-group.date').datepicker({
  format: "dd-mm-yyyy (DD)",
  language: "es",   
  startDate: "today",
  todayHighlight: true  
});   

/*menu busqueda*/
function varticalCenterStuff() {
  var windowHeight = $(window).height();
  var loginBoxHeight = $('.login-box').innerHeight();
  var welcomeTextHeight = $('.welcome-text').innerHeight();
  var loggedIn = $('.logged-in').innerHeight();
  
  var mathLogin = (windowHeight / 2) - (loginBoxHeight / 2);
  var mathWelcomeText = (windowHeight / 2) - (welcomeTextHeight / 2);
  var mathLoggedIn = (windowHeight / 2) - (loggedIn / 2);
  
  $('.welcome-text').css('margin-top', mathWelcomeText);

}
$(window).resize(function () {
  varticalCenterStuff();
});
varticalCenterStuff();



/*busqueda de vuelos */
$('.btn-login-submit').click(function(e){
  e.preventDefault();

  var element = $(this).parent().parent().parent();
  /*validaciones*/
  var bandera = 1;
  var destino=$('#destino').val();
  var origen=$('#origen').val();
  var calendario=$('#calendario').val();
  if (destino) {
    if (jQuery.inArray(destino,states)== -1 ) {
     $("#destinoError").last().addClass( "has-error has-feedback" );
     $("#iconoDestinoError").removeClass("invisible");
     bandera = 0;
   }}
   if (origen){
     if (jQuery.inArray(origen,states)== -1) {
       $("#origenError").last().addClass( "has-error has-feedback" );
       $("#iconoOrigenError").removeClass("invisible");
       bandera = 0;
     }}
     if (!calendario) {
       $("#calendarioError").last().addClass( "has-error has-feedback" );
       bandera = 0;
     }
     if (bandera == 1){

      $('.login-box').fadeOut(function(){
        $('.logged-in').fadeIn();
      });

      setTimeout(function(){
    $('#busquedaVuelos #botonBusqueda').click(); // establece true el boton para cargar la pagina nueva 
    $("#busquedaVuelos").submit(); // continua luego de 2 s


  }, 2000);
    }
  });
/*cargar cliente */
$('.created-in').fadeIn();
$('.btn-create-submit').click(function(e){
  e.preventDefault();

  var element = $(this).parent().parent().parent();
  /*validaciones*/
  var bandera = 1;
  var nombreApellido=$('#nombreApellido').val();
  var dni=$('#dni').val();
  var email=$('#email').val();
  var fechaNacimiento=$('#fechaNacimiento').val();
  expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if (dni.length!=8) {
   $("#dniError").last().addClass( "has-error has-feedback" );
       $("#iconoErrorDni").removeClass("invisible");
   bandera = 0;
 }

 if (nombreApellido.length==0) {
   $("#nombreApellidoError").last().addClass( "has-error has-feedback" );
   $("#iconoErrorNombre").removeClass("invisible");
   bandera = 0;
 }
 if (!email.match(expr)) {
   $("#emailError").last().addClass( "has-error has-feedback" );
   $("#iconoErrorEmail").removeClass("invisible");
   bandera = 0;
 }
 if (!fechaNacimiento) {
   $("#fechaNacimientoError").last().addClass( "has-error has-feedback" );
   bandera = 0;
 }
 if (bandera == 1){ 

    $('#busquedaVuelos #cargarDatos').click(); // establece true el boton para cargar la pagina nueva 
    $("#busquedaVuelos").submit(); 

  }
});

// PAGO DE TARJETA 
 $(document).ready(function() {
  $('input[type=radio][name=tarjetaEmpresa]').change(function() 
    { if (this.value == 'visa') 
      { 
        alert(this.value);
       
        var tipoTarjeta = 'visa';
      } 
    else if (this.value == 'masterCard') 
      {
         alert(this.value);
        var tipoTarjeta = 'masterCard';
        
            
          
      }
          else if (this.value == 'cabal') 
      {
         alert(this.value);
        var tipoTarjeta = 'cabal';
         
              
          
      }
      
   }
   );


 //$('.created-in').fadeIn();
 $('.btn-pago-submit').click(function(e){
  e.preventDefault();

  var element = $(this).parent().parent().parent();
  /*validaciones*/
  var bandera = 1;
  var nombreApellido=$('#nombreApellido').val();
  var codigoSeguridad=$('#codigoSeguridad').val();
  var numeroTarjeta=$('#numeroTarjeta').val();
  var fechaVencimiento=$('#fechaVencimiento').val();
  expr = /([0-99]+[0-99])/;
   var tipoTarjeta = 'visa';
  if (codigoSeguridad.length!=3) {
   $("#codigoSeguridadError").last().addClass( "has-error has-feedback" );
   bandera = 0;
 }

 if (nombreApellido.length==0) {
   $("#nombreApellidoError").last().addClass( "has-error has-feedback" );
   bandera = 0;
 }
 if (numeroTarjeta.length != 16) {
   $("#numeroTarjetaError").last().addClass( "has-error has-feedback" );
    bandera = 0;
   }  

 var tarjEmpresa = $('.tarjetaEmpresa').val();
 
 switch(tipoTarjeta) {
    case 'visa':
     var numTarj=numeroTarjeta.toString();
        var numTarje=numTarj.substring(0,4);
           if (numTarje!='4540')
          {
            $("#numeroTarjetaError").last().addClass( "has-error has-feedback" );
             bandera=0;
          }
        break;
    case 'masterCard':
          var numTarj=numeroTarjeta.toString();
           var numTarje=numTarj.substring(0,1);
          if (numTarje!='5')
              {
                $("#numeroTarjetaError").last().addClass( "has-error has-feedback" );
                 bandera=0;
              }
        break;
    case 'cabal':
           var numTarj=numeroTarjeta.toString();
           var numTarje=numTarj.substring(0,2);
          if (numTarje!='58')
                {
                  $("#numeroTarjetaError").last().addClass( "has-error has-feedback" );
                   bandera=0;
                }   
        break;
    
}




 if (fechaVencimiento.length != 5 || !fechaVencimiento.match(expr)  ) {
   $("#fechaVencimientoError").last().addClass( "has-error has-feedback" );
   bandera = 0;

 }
 if (bandera == 1){ 

    $('#pagoTarjetaFormulario #cargarDatos').click(); // establece true el boton para cargar la pagina nueva 
    $("#pagoTarjetaFormulario").submit(); 

  }
}); });
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
/*deshabilita los lugares ya ocupados*/
$("#P7").attr("disabled", true);
/* BUTACAS AJAX*/
$(function(){
    $("button").on("click", function (e) {
      console.log("adentro")
        $("button").removeClass("btn-info "); // hace que solo alla un boton azul
      $(this).addClass(" btn-info"); // pinta de azul
     //$(this).attr("disabled", true); // deshabilita el boton

      var data = $(this)
//var reserva = $('#codigoReserva').val()
    $.ajax({
     data: data, // envia datos 
     type: "post",
     url: "../php/ajaxAsientos.php",
      });
    });
 }); 
/*^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^*/
/*cambio de precio economy primera */
/*

$('.primera').hide();
 $( "#selector" ).change(function(){
    var selector=$('#selector').val();
   
    if (selector == "economico") {
  $('.primera').hide();
  $('.economy').show();
  }
   if (selector == "primera") {
   $('.primera').show();
     $('.economy').hide();
 }
 
});*/
/**/
