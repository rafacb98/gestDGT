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
		<a href='../../cerrarsesion.php' class='cerrarsesion'><i class="fas fa-sign-out-alt"></i></a>
	</header>

	<main class="epico">
		
		<span class="botonsubir"><i class="fas fa-arrow-up"></i></span>
		<section>
			
			
			<h2>TÉRMINOS Y POLÍTICA</h2>
			<article>
				<h3>Política de privacidad</h3>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			</article>
			<article>
				<h3>Términos y condiciones</h3>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
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
