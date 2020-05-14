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

 
    
})
