<?php
session_name('gestdgt+');
session_start();
require "../../funciones_servicios.php";

if (isset($_SESSION['usuario'])){
	$errorclaveantigua=true;
	$errorclavenueva=true;
	$errorclavenueva2=true;
	$dni=obtener_usuario($_SESSION['usuario'],$_SESSION['clave']);

	if(isset($_POST['btnactualizarperfil']))
	{
		
		$errorclaveantigua=($_POST['claveantigua']=="" || (md5($_POST['claveantigua'])!=$_SESSION['clave']));
		$errorclavenueva=($_POST['clavenueva']=="" || ($_POST['clavenueva']!=$_POST['clavenueva2']));
		$errorclavenueva2=($_POST['clavenueva']=="" || ($_POST['clavenueva']!=$_POST['clavenueva2']));

		$ningunerror=(!$errorclaveantigua&&!$errorclavenueva&&!$errorclavenueva2);

		if($ningunerror)
		{
			$_SESSION['clave']=md5($_POST['clavenueva']);
			actualizarclaveperfil($dni['dni'],$_POST['clavenueva']);
		}

	}
	?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Términos y política de privacidad | GestDGT+</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Rafael Carrillo Bonilla">
	<meta name="description" content="GestDGT+">
	<meta name="lang" content="es-ES" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="../../css/estilosterminos.css">
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
					<li><a href="perfil.php">VER PERFIL</a></li>
					<li><a href="multas.php">GESTIONAR MULTAS</a></li>
					<li><a id='seleccionado' href="nuevamulta.php">NUEVA MULTA</a></li>
       </ul>
		
	   <a class='enlace' href='../..'><img src="../../img/logotipo.svg" alt="logo" /></a>
		<a href='../../cerrarsesion.php' class='cerrarsesion'><p class='cerrarsesionescritorio'>Cerrar sesión</p><i class="fas fa-sign-out-alt"></i></a>
	</header>

	<main class="epico">
		
		<span class="botonsubir"><i class="fas fa-arrow-up"></i></span>
		<section>
			
			
			<h2>TÉRMINOS Y POLÍTICA</h2>
			<article>
				<h3>Política de privacidad</h3>
				<p>Una política tiene privacidad o póliza de privacidad es un documento legal que plantea cómo una organización retiene, procesa o maneja los datos del usuario y cliente. Esta es mayoritariamente usada en un sitio de internet, donde el usuario crea una cuenta. La póliza de privacidad es un contrato en el cual susodicha organización promete mantener la información personal del usuario. Cada organización del internet tiene su propia póliza de privacidad, y cada una de ellas varía. Es la responsabilidad del usuario leerla, para asegurarse de que no hay condiciones por las cuales se lleve a cabo un intercambio de información del usuario, la cual puede ser vista como una violación de privacidad.</p>
			</article>
			<article>
				<h3>Términos y condiciones</h3>
				<p>Los términos y condiciones, también conocidos como condiciones de uso y contratación, son elementos que regulan la relación con el usuario respecto al acceso de los contenidos y de los servicios que se ponen a disposición a través de la página web. Dichas condiciones son redactadas unilateralmente por el empresario titular de la página web o tienda online sin posibilidad de que los usuarios tengan capacidad de negociación dado que se trata de contratos de adhesión.</p>
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
