
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
		<link rel="stylesheet" type="text/css" href="css/estilosinicio2.css">
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
					<li><a href="vistas/agente/perfil.php">VER PERFIL</a></li>
					<li><a href="vistas/agente/multas.php">GESTIONAR MULTAS</a></li>
					<li><a href="vistas/agente/nuevamulta.php">NUEVA MULTA</a></li>
			</ul>
	
		
			<a class='enlace' href='index.php'><img src="img/logotipo.svg" alt="logo" /></a>
			<a href='cerrarsesion.php' class='cerrarsesion'><p class='cerrarsesionescritorio'>Cerrar sesión</p><i class="fas fa-sign-out-alt"></i></a>
		</header>
	
		<main class="epico">
			<span class="botonsubir"><i class="fas fa-arrow-up"></i></span>
			<section>
				
			
	
				<h2 id='novedades'>ÚLTIMAS NOTICIAS</h2>
				
				<article class="especial">
				<img src="img/novedad1.jpg" alt="novedad1"/>
				<p>La Dirección General de Tráfico procederá a reabrir las Jefaturas Provinciales y Locales de Tráfico en aquellas provincias que entren en la fase II de la desescalada regulada por el Gobierno en el Plan para la transición hacia la nueva normalidad, prevista para el próximo lunes 25 de mayo en numerosas provincias.</p>	
			</article>
			<article class="especial">
				
				<img src="img/novedad2.jpg" alt="novedad2"/>
				<p>La apertura el próximo lunes 11 de mayo de la mayoría de los centros de reconocimiento de conductores, lleva a la Dirección General de Tráfico a recordar a los ciudadanos que los permisos de conducción que hayan caducado durante el estado de alarma mantienen su vigencia durante dicho periodo y hasta 60 días hábiles después de finalizado el mismo.</p>	
			</article>
			
			<article class="especial">
				
				<img src="img/novedad3.jpg" alt="novedad3"/>
				<p>El Gobierno acaba de anunciar que dará una ayuda de 500 euros para la compra de bicicletas convencionales, eléctricas y patinetes y similares. El motivo, hacer frente a la crisis del coronavirus e incentivar una movilidad segura.</p>	
			</article>
			<article class="especial">
				
				<img src="img/novedad4.jpg" alt="novedad4"/>
				<p>Cumplir años tiene como contrapartida una merma en las capacidades para conducir: rigidez en los músculos y articulaciones; reflejos más lentos; dificultades para ver de noche y mayor peligro ante deslumbramientos; problemas de audición...</p>		
			</article>
			<article class="especial">
				<img src="img/novedad2.jpg" alt="novedad5"/>
				<p>La Dirección General de Tráfico procederá a reabrir las Jefaturas Provinciales y Locales de Tráfico en aquellas provincias que entren en la fase II de la desescalada regulada por el Gobierno en el Plan para la transición hacia la nueva normalidad, prevista para el próximo lunes 25 de mayo en numerosas provincias.</p>	
			</article>
			<article class="especial">
				
				<img src="img/novedad4.jpg" alt="novedad6"/>
				<p>La apertura el próximo lunes 11 de mayo de la mayoría de los centros de reconocimiento de conductores, lleva a la Dirección General de Tráfico a recordar a los ciudadanos que los permisos de conducción que hayan caducado durante el estado de alarma mantienen su vigencia durante dicho periodo y hasta 60 días hábiles después de finalizado el mismo.</p>		
			</article>
			
			<article class="especial">
				
				<img src="img/novedad1.jpg" alt="novedad7"/>
				<p>El Gobierno acaba de anunciar que dará una ayuda de 500 euros para la compra de bicicletas convencionales, eléctricas y patinetes y similares. El motivo, hacer frente a la crisis del coronavirus e incentivar una movilidad segura.</p>	
			</article>
			<article class="especial">
				
				<img src="img/novedad3.jpg" alt="novedad8"/>
				<p>Cumplir años tiene como contrapartida una merma en las capacidades para conducir: rigidez en los músculos y articulaciones; reflejos más lentos; dificultades para ver de noche y mayor peligro ante deslumbramientos; problemas de audición...</p>		
			</article>
		
	
				
					
			</section>	
		</main>
		
		<footer>
				<ul class='social'>
				<li><a class='enlacesocial' target='_blank' href='https://www.linkedin.com/in/rafael-carrillo-bonilla-a6a3bb177/'><i id="twitter" class="fab fa-twitter"></i><span>&nbsp;&nbsp;&nbsp;&nbsp;/gestdgt+</span></a></li>
				<li><a class='enlacesocial' target='_blank' href='https://www.linkedin.com/in/rafael-carrillo-bonilla-a6a3bb177/'><i id="facebook" class="fab fa-facebook-square"></i><span>&nbsp;&nbsp;&nbsp;&nbsp;/gestdgt+</span></a></li>
				<li><a class='enlacesocial' target='_blank' href='https://www.linkedin.com/in/rafael-carrillo-bonilla-a6a3bb177/'><i id="instagram" class="fab fa-instagram"></i><span>&nbsp;&nbsp;&nbsp;&nbsp;/gestdgt+</span></a></li>
				</ul>
				<p>© 2019-2020 | Rafael Carrillo Bonilla | Todos los derechos reservados</p>
				<a href="http://www.w3.org/WAI/WCAG1AA-Conformance" title="Explicación del Nivel Doble-A de Conformidad">
			<img class='w3' height="32" width="88" src="http://www.w3.org/WAI/wcag1AA" alt="Icono de conformidad con el Nivel Doble-A, de las Directrices de Accesibilidad para el Contenido Web 1.0 del W3C-WAI"></a>
		</footer>

	</body>
	</html>
	<?php
    }else{
		
		header('Location: ../../index.php');
	 die();
	}
	 ?>
	

