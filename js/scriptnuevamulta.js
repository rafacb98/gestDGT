$(document).ready(function () {
 
  $("input[type='file']").inputFileText({
    text: 'Adjuntar foto'
  });
  
  jQuery.datetimepicker.setLocale('es');
  jQuery('#fechahora').datetimepicker();

  var file = document.getElementById('foto');

  file.onchange = function(e) {
    var ext = this.value.match(/\.([^\.]+)$/)[1];
    switch (ext) {
      case 'jpg':
      case 'jpeg':
      case 'png':
      
        break;
      default:
        alert('Formato no permitido, solo .png, .jpg o .jpeg');
  
        this.value = '';
      
     
    }
  };
});


