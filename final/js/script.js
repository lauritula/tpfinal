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

var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
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
  //remote: '/search.php?query=%QUERY' // base de datos 
});
/*CALENDARIO */
$('.input-group.date').datepicker({
  format: "mm/dd/yyyy (DD)",
  language: "es",   
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




$('.btn-login-submit').click(function(e){
  e.preventDefault();

  var element = $(this).parent().parent().parent();

  
  $('.login-box').fadeOut(function(){
    $('.logged-in').fadeIn();
  });
  
  setTimeout(function(){
    $('#busquedaVuelos #botonBusqueda').click(); // establece true el boton para cargar la pagina nueva 
    $("#busquedaVuelos").submit(); // continua luego de 2 s


}, 2000);

});
