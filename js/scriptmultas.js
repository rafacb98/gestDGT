$(document).ready(function() {

	$(window).on('load',function () {
		$(".edita").click(function(){
		   $('.fondo').show();
		});
		$('.fondo').click(function(){
			$('.fondo').hide();
		});
		$('.popupcerrar').click(function(){
			$('.fondo').hide();
		});
	});


	$('#multas').basictable({
		breakpoint: 1000,
	  });

	  
		                      
	
	  
});