var url = "http://localhost/gestDGT/REST/";

$(document).ready(function () {

  // Cuando hagamos scroll, añadimos la clase fija al encabezado y menu para que se queden fijos, y cuando volvamos
  // se la quitamos para que vuelvan a como estaban
  $(window).scroll(function () {
    if ($(document).scrollTop() > 30) {
      // Estas clases tienen la propiedad de menos opacidad
      $('header').addClass('fija');
      $('ul#menu').addClass('fija2');
    }
    else {
      $('header').removeClass('fija');
      $('ul#menu').removeClass('fija2');
    }
  });

  // Cuando haga click en el boton de subir hacia arriba, el body y html lo subimos hasta arriba
  $('.botonsubir').click(function () {
    $('body, html').animate({
      scrollTop: '0px'
    }, 300);
  });

  // Cuando se haga scroll aparecera el boton subir y cuando suba de nuevo, desaparecera
  $(window).scroll(function () {
    if ($(this).scrollTop() > 0) {
      $('.botonsubir').slideDown(300);
    } else {
      $('.botonsubir').slideUp(300);
    }
  });


  // Con ayuda de una variable booleana controlamos cuando abre y cierra el menu
  var x = false;
  // Cuando haga click desplegamos el menu
  $("#hamburguesa").click(function () {

    $("ul#menu").toggleClass('active');

    // Si no le hemos tendra su efecto original
    if (x) {
      x = false;
      $("main").css({ "filter": "blur(0)", "transform": "translate(0)", "transition-duration": "1s" });
      $("footer").css({"filter": "blur(0)","transform":"translate(0)"});
      $("ul#menu li").css("display", "none");
      
     
    }
    // En caso de que le hayamos dado click, le añadimos el blur que dara eun efecto de opacidad a los elementos y los movemos
    // hacia la derecha
    else {
      x = true;
      $("main").css({ "filter": "blur(0.3em)", "transform": "translate(250px)", "transition-duration": "1s" });
      $("footer").css({"filter": "blur(0.3em)","transform":"translate(250px)"});
      $("ul#menu li").css("display", "block");
      
      
    }
  });

 // De nuevo con ayuda de una variable booleana controlamos cuando hizo click
 var y=false;
 // Cuando haga click en los "mas info" apareceran los distintos tipos de carne
 $('#masinfo').click(function () {
   if(y)
   {
     y=false;
     $(this).css({"background-color":"#11538C"});
     $(this).html("Más información");
     $(".tiposdecarne p").fadeOut();
   }
   // Cuando haga otro click desaparecerá
   else
   {
     y=true;
     $(this).css({"background-color":"red","color":"white"});
     $(this).html("Menos información");
     $(".tiposdecarne p").fadeIn();
   }
   
 })

 multas();

 // Función que hace una llamada AJAX para mostrar todas las multas
 function multas() {
  $.getJSON(url + "multas")
      .done(function (data) {
          if (data.multas) {
              var output = "<table>";
              output += "<tr><th>Fecha/Hora</th><th>DNI</th><th>Matrícula</th><th>Precio</th><th>Estado</th><th>Observaciones</th><th>Foto</th></tr>";
              // Cada multa
              $.each(data.multas, function (key, value) {
                  output += '<tr>';
                  // Los valores de cada multa
                  var foto="<img src='../../img/"+ value['foto'] +"' />";
                  
                  output += '<td>' + value['fecha_y_hora'] + '</td>'; 
                  output += '<td>' + value['dni_conductor'] + '</td>'; 
                  output += '<td>' + value['matricula_vehiculo'] + '</td>'; 
                  output += '<td>' + value['precio'] + '€</td>'; 
                  output += '<td>' + value['estado'] + '</td>'; 
                  output += '<td>' + value['observaciones'] + '</td>'; 
                  output += '<td>'+foto+'</td>'; 
                  output += '</tr>';
              });
              output += '</table>';
              $("#multas").html(output);
          }
          else
          {
              $("#mensaje").html(data.mensaje_error);
          }
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
          if (console && console.log) {
              console.log("La solicitud a fallado: " + textStatus);
          }
      });
}


});


