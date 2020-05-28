<?php

if (isset($_SESSION['usuario'])){
	?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio | GestDGT+</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Rafael Carrillo Bonilla">
	<meta name="description" content="GestDGT+">
	<meta name="lang" content="es-ES" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="css/estilosinicio.css">
	<script src="https://kit.fontawesome.com/4a9d5317b6.js" crossorigin="anonymous"></script>
	<link rel="icon" href="img/logotipo.svg">
	<link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
	<script src='js/jquery-3.1.1.js'></script>
	<script src='js/scriptgeneral.js'></script>
	<script type="text/javascript" language="Javascript">
      document.oncontextmenu = function(){return false}
	</script>
</head>
<body>

	<header>
	<input type="checkbox" id="ham"/>
       <label for="ham" id="hamburguesa">
               <span></span>
               <span></span>
               <span></span>     
       </label>    
       <ul id="menu">
	   <?php
				$saludo=obtener_usuario($_SESSION['usuario'],$_SESSION['clave']);
			?>
				<p class='bienvenida'>¡Hola <span class='usuario'><?php echo $saludo['nombre'];?></span>!</p>
				<li><a id='seleccionado' href="index.php">INICIO</a></li>
				<li><a href="vistas/conductor/puntos.php">VER PUNTOS</a></li>
				<li><a href="vistas/conductor/perfil.php">VER PERFIL</a></li>
				<li><a href="vistas/conductor/vehiculos.php">VER VEHICULOS</a></li>
				
    </ul>
		
	
		<img src="img/logotipo.svg" alt="logo" />
		
			<a href='cerrarsesion.php' class='cerrarsesion'><i class="fas fa-sign-out-alt"></i></a>
	</header>

	<main class="epico">

		<span class="botonsubir"><i class="fas fa-arrow-up"></i></span>
		<section>
			
			
			
			

			<h2 id='novedades'>ÚLTIMAS NOTICIAS</h2>
			
			<article class="especial">
				<img src="img/novedades.png" alt="novedad1"/>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit dapibus, ridiculus mattis montes condimentum eget nostra erat diam vulputate, convallis sagittis praesent scelerisque posuere elementum facilisis. Quisque nisi faucibus montes pellentesque tellus dictum fringilla tempor hendrerit, etiam integer quis vel orci vivamus duis nisl risus scelerisque, turpis tincidunt dictumst ridiculus dapibus non bibendum sollicitudin. Odio quam felis convallis aenean mi lacinia torquent curae donec cum, senectus sagittis molestie litora volutpat mattis euismod viverra pulvinar eget metus, fringilla orci nascetur eleifend pellentesque hac dapibus arcu aliquet.	
			</article>
			<article class="especial">
				
				<img src="img/novedades.png" alt="novedad2"/>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit dapibus, ridiculus mattis montes condimentum eget nostra erat diam vulputate, convallis sagittis praesent scelerisque posuere elementum facilisis. Quisque nisi faucibus montes pellentesque tellus dictum fringilla tempor hendrerit, etiam integer quis vel orci vivamus duis nisl risus scelerisque, turpis tincidunt dictumst ridiculus dapibus non bibendum sollicitudin. Odio quam felis convallis aenean mi lacinia torquent curae donec cum, senectus sagittis molestie litora volutpat mattis euismod viverra pulvinar eget metus, fringilla orci nascetur eleifend pellentesque hac dapibus arcu aliquet.
			</article>
			
			<article class="especial">
				
				<img src="img/novedades.png" alt="novedad2"/>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit dapibus, ridiculus mattis montes condimentum eget nostra erat diam vulputate, convallis sagittis praesent scelerisque posuere elementum facilisis. Quisque nisi faucibus montes pellentesque tellus dictum fringilla tempor hendrerit, etiam integer quis vel orci vivamus duis nisl risus scelerisque, turpis tincidunt dictumst ridiculus dapibus non bibendum sollicitudin. Odio quam felis convallis aenean mi lacinia torquent curae donec cum, senectus sagittis molestie litora volutpat mattis euismod viverra pulvinar eget metus, fringilla orci nascetur eleifend pellentesque hac dapibus arcu aliquet.
			</article>
			<article class="especial">
				
				<img src="img/novedades.png" alt="novedad2"/>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit dapibus, ridiculus mattis montes condimentum eget nostra erat diam vulputate, convallis sagittis praesent scelerisque posuere elementum facilisis. Quisque nisi faucibus montes pellentesque tellus dictum fringilla tempor hendrerit, etiam integer quis vel orci vivamus duis nisl risus scelerisque, turpis tincidunt dictumst ridiculus dapibus non bibendum sollicitudin. Odio quam felis convallis aenean mi lacinia torquent curae donec cum, senectus sagittis molestie litora volutpat mattis euismod viverra pulvinar eget metus, fringilla orci nascetur eleifend pellentesque hac dapibus arcu aliquet.
			</article>
			<article class="especial">
				<img src="img/novedades.png" alt="novedad1"/>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit dapibus, ridiculus mattis montes condimentum eget nostra erat diam vulputate, convallis sagittis praesent scelerisque posuere elementum facilisis. Quisque nisi faucibus montes pellentesque tellus dictum fringilla tempor hendrerit, etiam integer quis vel orci vivamus duis nisl risus scelerisque, turpis tincidunt dictumst ridiculus dapibus non bibendum sollicitudin. Odio quam felis convallis aenean mi lacinia torquent curae donec cum, senectus sagittis molestie litora volutpat mattis euismod viverra pulvinar eget metus, fringilla orci nascetur eleifend pellentesque hac dapibus arcu aliquet.	
			</article>
			<article class="especial">
				
				<img src="img/novedades.png" alt="novedad2"/>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit dapibus, ridiculus mattis montes condimentum eget nostra erat diam vulputate, convallis sagittis praesent scelerisque posuere elementum facilisis. Quisque nisi faucibus montes pellentesque tellus dictum fringilla tempor hendrerit, etiam integer quis vel orci vivamus duis nisl risus scelerisque, turpis tincidunt dictumst ridiculus dapibus non bibendum sollicitudin. Odio quam felis convallis aenean mi lacinia torquent curae donec cum, senectus sagittis molestie litora volutpat mattis euismod viverra pulvinar eget metus, fringilla orci nascetur eleifend pellentesque hac dapibus arcu aliquet.
			</article>
			
			<article class="especial">
				
				<img src="img/novedades.png" alt="novedad2"/>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit dapibus, ridiculus mattis montes condimentum eget nostra erat diam vulputate, convallis sagittis praesent scelerisque posuere elementum facilisis. Quisque nisi faucibus montes pellentesque tellus dictum fringilla tempor hendrerit, etiam integer quis vel orci vivamus duis nisl risus scelerisque, turpis tincidunt dictumst ridiculus dapibus non bibendum sollicitudin. Odio quam felis convallis aenean mi lacinia torquent curae donec cum, senectus sagittis molestie litora volutpat mattis euismod viverra pulvinar eget metus, fringilla orci nascetur eleifend pellentesque hac dapibus arcu aliquet.
			</article>
			<article class="especial">
				
				<img src="img/novedades.png" alt="novedad2"/>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit dapibus, ridiculus mattis montes condimentum eget nostra erat diam vulputate, convallis sagittis praesent scelerisque posuere elementum facilisis. Quisque nisi faucibus montes pellentesque tellus dictum fringilla tempor hendrerit, etiam integer quis vel orci vivamus duis nisl risus scelerisque, turpis tincidunt dictumst ridiculus dapibus non bibendum sollicitudin. Odio quam felis convallis aenean mi lacinia torquent curae donec cum, senectus sagittis molestie litora volutpat mattis euismod viverra pulvinar eget metus, fringilla orci nascetur eleifend pellentesque hac dapibus arcu aliquet.
			</article>
		</section>	
	</main>
	
	<footer>
			<ul>
				<li><i id="twitter" class="fab fa-twitter"></i><span>&nbsp;&nbsp;&nbsp;&nbsp;/gestdgt+</span></li>
				<li><i id="facebook" class="fab fa-facebook-square"></i><span>&nbsp;&nbsp;&nbsp;&nbsp;/gestdgt+</span></li>
				<li><i id="instagram" class="fab fa-instagram"></i><span>&nbsp;&nbsp;&nbsp;&nbsp;/gestdgt+</span></li>		
			</ul>
	</footer>
	
</body>
</html>
<?php
    }else{	
		header('Location: ../../index.php');
	 die();
	}
	 ?>
