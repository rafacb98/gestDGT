$(document).ready(function(){
    $('#btnentrar').click(function(){
        const usu = $('#usuariop').val();
        const clave = $('#clavep').val();
        if(!usu){
          $('.usuario').css({"border":"3px red solid", "border-radius":"5px"}).effect("shake", {distance:1});
          return;
        } else if(!clave){
          $('.clave').css({"border":"3px red solid", "border-radius":"5px"}).effect("shake", {distance:1});;
          return;
        }
        
    });
         
    $('#usuario, #clave').focus(function(){
        $('.usuario').css({"border":"3px solid transparent"});
        $('.clave').css({"border":"3px solid transparent"});
    })   

    // Cuando le de al boton de mostrar, quitamos el atributo type y le cambiamos el icono y luego al reves igual
    $('#mostrar').click(function(){
      if($(this).hasClass('far fa-eye-slash'))
      {
        $('#clavep').removeAttr('type');
        $('#mostrar').addClass('far fa-eye').removeClass('far fa-eye-slash');
      }
     
      else
      {
        $('#clavep').attr('type','password');
        $('#mostrar').addClass('far fa-eye-slash').removeClass('far fa-eye');
      }
       });
})
