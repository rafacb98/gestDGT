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

 

 $('#mostrar1').click(function(){
  if($(this).hasClass('fas fa-eye-slash'))
  {
    $('#claveantigua').removeAttr('type');
    $('#mostrar1').addClass('fa-eye').removeClass('fa-eye-slash');
  }

  else
  {
    $('#claveantigua').attr('type','password');
    $('#mostrar1').addClass('fa-eye-slash').removeClass('fa-eye');
  }
   });

   $('#mostrar2').click(function(){
    if($(this).hasClass('fas fa-eye-slash'))
    {
      $('#clavenueva').removeAttr('type');
      $('#mostrar2').addClass('fa-eye').removeClass('fa-eye-slash');
    }
  
    else
    {
      $('#clavenueva').attr('type','password');
      $('#mostrar2').addClass('fa-eye-slash').removeClass('fa-eye');
    }
     });

     $('#mostrar3').click(function(){
      if($(this).hasClass('fas fa-eye-slash'))
      {
        $('#clavenueva2').removeAttr('type');
        $('#mostrar3').addClass('fa-eye').removeClass('fa-eye-slash');
      }
    
      else
      {
        $('#clavenueva2').attr('type','password');
        $('#mostrar3').addClass('fa-eye-slash').removeClass('fa-eye');
      }
       });


       document.getElementById("verpuntos").addEventListener("click",function(){
        document.getElementsByClassName("fondo_transparente")[0].style.display="block" 
        return false
     })
     document.getElementsByClassName("modal_cerrar")[0].addEventListener("click",function(){
         document.getElementsByClassName("fondo_transparente")[0].style.display="none" 
     })


});


