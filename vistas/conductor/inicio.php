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
				<li><a href="vistas/conductor/perfil.php">VER PERFIL</a></li>
				<li><a href="vistas/conductor/vehiculos.php">VER VEHICULOS</a></li>
				
    </ul>
		
	
		<a class='enlace' href='index.php'><img src="img/logotipo.svg" alt="logo" /></a>
		
			<a href='cerrarsesion.php' class='cerrarsesion'><i class="fas fa-sign-out-alt"></i></a>
	</header>

	<main class="epico">

		<span class="botonsubir"><i class="fas fa-arrow-up"></i></span>
		<section>
			
			<aside>
				<p>Consulte sus puntos aquí</p>
				<button id='verpuntos' class='btnverpuntos'>Ver puntos</button>
			</aside>
			
			<div class="fondo_transparente">
        		<div class="modal">
            		<div class="modal_cerrar">
                		<span>X</span>
            		</div>
            		<div class="modal_titulo">Puntos</div>
					<div class="modal_mensaje">
						
						<p class='circulo'><?php echo verpuntos($_SESSION['usuario']);?></p>
					</div>
					<div class="modal_botones">
						<a href="" class="boton">ACEPTAR</a>
					</div>
        		</div>
    		</div>   
		

			<h2 id='novedades'>ÚLTIMAS NOTICIAS</h2>
			
			<article class="especial">
				<img src="img/novedades.png" alt="novedad1"/>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit dapibus, ridiculus mattis montes condimentum eget nostra erat diam vulputate, convallis sagittis praesent scelerisque posuere elementum facilisis. Quisque nisi faucibus montes pellentesque tellus dictum fringilla tempor hendrerit, etiam integer quis vel orci vivamus duis nisl risus scelerisque, turpis tincidunt dictumst ridiculus dapibus non bibendum sollicitudin. Odio quam felis convallis aenean mi lacinia torquent curae donec cum, senectus sagittis molestie litora volutpat mattis euismod viverra pulvinar eget metus, fringilla orci nascetur eleifend pellentesque hac dapibus arcu aliquet.</p>	
			</article>
			<article class="especial">
				
				<img src="img/novedades.png" alt="novedad2"/>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit dapibus, ridiculus mattis montes condimentum eget nostra erat diam vulputate, convallis sagittis praesent scelerisque posuere elementum facilisis. Quisque nisi faucibus montes pellentesque tellus dictum fringilla tempor hendrerit, etiam integer quis vel orci vivamus duis nisl risus scelerisque, turpis tincidunt dictumst ridiculus dapibus non bibendum sollicitudin. Odio quam felis convallis aenean mi lacinia torquent curae donec cum, senectus sagittis molestie litora volutpat mattis euismod viverra pulvinar eget metus, fringilla orci nascetur eleifend pellentesque hac dapibus arcu aliquet.</p>
			</article>
			
			<article class="especial">
				
				<img src="img/novedades.png" alt="novedad3"/>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit dapibus, ridiculus mattis montes condimentum eget nostra erat diam vulputate, convallis sagittis praesent scelerisque posuere elementum facilisis. Quisque nisi faucibus montes pellentesque tellus dictum fringilla tempor hendrerit, etiam integer quis vel orci vivamus duis nisl risus scelerisque, turpis tincidunt dictumst ridiculus dapibus non bibendum sollicitudin. Odio quam felis convallis aenean mi lacinia torquent curae donec cum, senectus sagittis molestie litora volutpat mattis euismod viverra pulvinar eget metus, fringilla orci nascetur eleifend pellentesque hac dapibus arcu aliquet.</p>
			</article>
			<article class="especial">
				
				<img src="img/novedades.png" alt="novedad4"/>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit dapibus, ridiculus mattis montes condimentum eget nostra erat diam vulputate, convallis sagittis praesent scelerisque posuere elementum facilisis. Quisque nisi faucibus montes pellentesque tellus dictum fringilla tempor hendrerit, etiam integer quis vel orci vivamus duis nisl risus scelerisque, turpis tincidunt dictumst ridiculus dapibus non bibendum sollicitudin. Odio quam felis convallis aenean mi lacinia torquent curae donec cum, senectus sagittis molestie litora volutpat mattis euismod viverra pulvinar eget metus, fringilla orci nascetur eleifend pellentesque hac dapibus arcu aliquet.</p>
			</article>
			<article class="especial">
				<img src="img/novedades.png" alt="novedad5"/>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit dapibus, ridiculus mattis montes condimentum eget nostra erat diam vulputate, convallis sagittis praesent scelerisque posuere elementum facilisis. Quisque nisi faucibus montes pellentesque tellus dictum fringilla tempor hendrerit, etiam integer quis vel orci vivamus duis nisl risus scelerisque, turpis tincidunt dictumst ridiculus dapibus non bibendum sollicitudin. Odio quam felis convallis aenean mi lacinia torquent curae donec cum, senectus sagittis molestie litora volutpat mattis euismod viverra pulvinar eget metus, fringilla orci nascetur eleifend pellentesque hac dapibus arcu aliquet.</p>
			</article>
			<article class="especial">
				
				<img src="img/novedades.png" alt="novedad6"/>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit dapibus, ridiculus mattis montes condimentum eget nostra erat diam vulputate, convallis sagittis praesent scelerisque posuere elementum facilisis. Quisque nisi faucibus montes pellentesque tellus dictum fringilla tempor hendrerit, etiam integer quis vel orci vivamus duis nisl risus scelerisque, turpis tincidunt dictumst ridiculus dapibus non bibendum sollicitudin. Odio quam felis convallis aenean mi lacinia torquent curae donec cum, senectus sagittis molestie litora volutpat mattis euismod viverra pulvinar eget metus, fringilla orci nascetur eleifend pellentesque hac dapibus arcu aliquet.</p>
			</article>
			
			<article class="especial">
				
				<img src="img/novedades.png" alt="novedad7"/>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit dapibus, ridiculus mattis montes condimentum eget nostra erat diam vulputate, convallis sagittis praesent scelerisque posuere elementum facilisis. Quisque nisi faucibus montes pellentesque tellus dictum fringilla tempor hendrerit, etiam integer quis vel orci vivamus duis nisl risus scelerisque, turpis tincidunt dictumst ridiculus dapibus non bibendum sollicitudin. Odio quam felis convallis aenean mi lacinia torquent curae donec cum, senectus sagittis molestie litora volutpat mattis euismod viverra pulvinar eget metus, fringilla orci nascetur eleifend pellentesque hac dapibus arcu aliquet.</p>
			</article>
			<article class="especial">
				
				<img src="img/novedades.png" alt="novedad8"/>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit dapibus, ridiculus mattis montes condimentum eget nostra erat diam vulputate, convallis sagittis praesent scelerisque posuere elementum facilisis. Quisque nisi faucibus montes pellentesque tellus dictum fringilla tempor hendrerit, etiam integer quis vel orci vivamus duis nisl risus scelerisque, turpis tincidunt dictumst ridiculus dapibus non bibendum sollicitudin. Odio quam felis convallis aenean mi lacinia torquent curae donec cum, senectus sagittis molestie litora volutpat mattis euismod viverra pulvinar eget metus, fringilla orci nascetur eleifend pellentesque hac dapibus arcu aliquet.</p>
			</article>
		</section>	
	</main>
	
	<footer>
			<ul class='social'>
				<li><a class='enlacesocial' target='_blank' href='https://www.linkedin.com/in/rafael-carrillo-bonilla-a6a3bb177/'><i id="twitter" class="fab fa-twitter"></i><span>&nbsp;&nbsp;&nbsp;&nbsp;/gestdgt+</span></a></li>
				<li><a class='enlacesocial' target='_blank' href='https://www.linkedin.com/in/rafael-carrillo-bonilla-a6a3bb177/'><i id="facebook" class="fab fa-facebook-square"></i><span>&nbsp;&nbsp;&nbsp;&nbsp;/gestdgt+</span></a></li>
				<li><a class='enlacesocial' target='_blank' href='https://www.linkedin.com/in/rafael-carrillo-bonilla-a6a3bb177/'><i id="instagram" class="fab fa-instagram"></i><span>&nbsp;&nbsp;&nbsp;&nbsp;/gestdgt+</span></a></li>
					
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
