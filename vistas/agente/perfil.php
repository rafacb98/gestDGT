<?php
session_name('gestdgt+');
session_start();
require "../../funciones_servicios.php";

if (isset($_SESSION['usuario'])){
	

	
	?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Perfil | GestDGT+</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Rafael Carrillo Bonilla">
	<meta name="description" content="GestDGT+">
	<meta name="lang" content="es-ES" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="../../css/estilosperfil2.css">
	<script src="https://kit.fontawesome.com/4a9d5317b6.js" crossorigin="anonymous"></script>
	<link rel="icon" href="../../img/logotipo.svg">
	<link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
	<script src='../../js/jquery-3.1.1.js'></script>
	<script src='../../js/sweetalert.min.js'></script>
	<script src='../../js/scriptgeneral.js'></script>
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
				<p class='bienvenida'>¡Hola <span class='usu'><?php echo $saludo['nombre'];?></span>!</p>
					<li><a href="../..">INICIO</a></li>
					<li><a id='seleccionado' href="perfil.php">VER PERFIL</a></li>
					<li><a href="multas.php">GESTIONAR MULTAS</a></li>
					<li><a href="nuevamulta.php">NUEVA MULTA</a></li>
       </ul>
		
	   <a class='enlace' href='../..'><img src="../../img/logotipo.svg" alt="logo" /></a>
		<a href='../../cerrarsesion.php' class='cerrarsesion'><p class='cerrarsesionescritorio'>Cerrar sesión</p><i class="fas fa-sign-out-alt"></i></a>
	</header>

	<main class="epico">
		<?php
			if(isset($_SESSION['mensajito']))
			{
				
				if($_SESSION['mensajito']=="actualizado")
				{
					echo "<script>swal('¡Bien!', 'Se ha actualizado la clave', 'success')</script>";
					
				}	
				unset($_SESSION['mensajito']);
			}

			?>
		<span class="botonsubir"><i class="fas fa-arrow-up"></i></span>
		<section>
			
			
			<h2>INFORMACIÓN PERSONAL</h2>
			<article>
				<?php
					verperfil2($_SESSION['usuario']);
					echo "<form class='editarclave' action='editarclave.php' method='post'>";
       
					echo "<button>Cambiar contraseña&nbsp;&nbsp;&nbsp;<i class='fas fa-lock'></i></button>";
				   echo "</form>"; 
				?>
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
