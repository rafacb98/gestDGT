
$(document).ready(function () {

  // Cuando pasemos el raton por encima del logo rotará 180 grados, cuando lo dejemos, volverá a su estado original
 

  // Cuando hagamos scroll, añadimos la clase fija al encabezado y menu para que se queden fijos, y cuando volvamos
  // se la quitamos para que vuelvan a como estaban
  $(window).scroll(function () {
    if ($(document).scrollTop() > 30) {
      // Estas clases tienen la propiedad de menos opacidad
      $('header').addClass('fija');
      $('.sidebar').addClass('fija2');
    }
    else {
      $('header').removeClass('fija');
      $('.sidebar').removeClass('fija2');
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
  $(".sidebarBtn").click(function () {

    $(".sidebar").toggleClass('active');

    // Si no le hemos tendra su efecto original
    if (x) {
      x = false;
      $("main").css({ "filter": "blur(0)", "transform": "translate(0)", "transition-duration": "1s" });
      $("footer").css("filter", "blur(0)");
      $(".sidebarBtn span").css({ "transform": "rotate(0deg)", "transition-duration": "1s" });
    }
    // En caso de que le hayamos dado click, le añadimos el blur que dara eun efecto de opacidad a los elementos y los movemos
    // hacia la derecha
    else {
      x = true;
      $("main").css({ "filter": "blur(0.3em)", "transform": "translate(250px)", "transition-duration": "1s" });
      $("footer").css("filter", "blur(0.3em)");
      $(".sidebarBtn span").css({ "transform": "rotate(90deg)", "transition-duration": "1s" });
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


