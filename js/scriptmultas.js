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

	$(document).keydown(function(e) { 
		if (e.keyCode == 27) { 
			$(".fondo").fadeOut(500);
		} 
 	});


	$('#multas').basictable({
		breakpoint: 1000,
	  });
	  
});