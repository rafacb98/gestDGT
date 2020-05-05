$(document).ready(function(){

    $('#btnentrar').click(function(){
        const username = $('#usuario').val();
        const password = $('#clave').val();
        if(!username){
          $('.usuario').css({"border":"2px red solid", "border-radius":"5px"}).effect("shake", {distance:1});
          return;
        } else if(!password){
          $('.clave').css({"border":"2px red solid", "border-radius":"5px"}).effect("shake", {distance:1});;
          return;
        }
        alert('Accediendo');
    });
      
      
    $('#usuario, #clave').focus(function(){
        $('.usuario').css({"border":"2px solid transparent"});
        $('.clave').css({"border":"2px solid transparent"});
    })
    
})
