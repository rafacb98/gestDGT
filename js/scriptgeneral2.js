var url = "http://localhost/gestDGT/REST/";

$(document).ready(function () {

  // Cuando hagamos scroll, añadimos la clase fija al encabezado y menu para que se queden fijos, y cuando volvamos
  // se la quitamos para que vuelvan a como estaban
 

  $(window).scroll(function () {
    if ($(document).scrollTop() > 30) {
      // Estas clases tienen la propiedad de menos opacidad
      $('header').addClass('fija');
      $('header img').addClass('fija2');
      $('header ul#menu li a').addClass('fija3');
      $('header ul#menu p').addClass('fija4');
      $('header .cerrarsesion').addClass('fija5');
      
    }
    else {
      $('header').removeClass('fija');
      $('header img').removeClass('fija2');
      $('header ul#menu li a').removeClass('fija3');
      $('header ul#menu p').removeClass('fija4');
      $('header .cerrarsesion').removeClass('fija5');
     
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


 


});


