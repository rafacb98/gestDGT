$(document).ready(function () {
 
  $("input[type='file']").inputFileText({
    text: 'Adjuntar foto'
  });
  
  jQuery.datetimepicker.setLocale('es');
  jQuery('#fechahora').datetimepicker();
});


