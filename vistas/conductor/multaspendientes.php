<?php
session_name('gestdgt+');
session_start();
require "../../funciones_servicios.php";

if (isset($_SESSION['usuario'])){

		
				
						
				
			
	?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Multas pendientes | GestDGT+</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Rafael Carrillo Bonilla">
	<meta name="description" content="GestDGT+">
	<meta name="lang" content="es-ES" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="../../css/estilosvehiculos.css">
	<script src="https://kit.fontawesome.com/4a9d5317b6.js" crossorigin="anonymous"></script>
	<link rel="icon" href="../../img/logotipo.svg">
	<link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
	<script src='../../js/jquery-3.1.1.js'></script>
	<script src="../../js/sweetalert.min.js"></script>
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

	   			<p class='bienvenida'>¡Hola <span class='usuario'><?php echo $saludo['nombre'];?></span>!</p>
	   			<li><a href="../..">INICIO</a></li>
				<li><a href="puntos.php">VER PUNTOS</a></li>
				<li><a href="perfil.php">VER PERFIL</a></li>
				<li><a id='seleccionado' href="vehiculos.php">VER VEHICULOS</a></li>
       </ul>
	
	   <a class='enlace' href='../..'><img src="../../img/logotipo.svg" alt="logo" /></a>
	
		<a href='../../cerrarsesion.php' class='cerrarsesion'><i class="fas fa-sign-out-alt"></i></a>
	</header>

	<main>
		<span class="botonsubir"><i class="fas fa-arrow-up"></i></span>
		<section>
			
			
			<h2>MULTAS PENDIENTES</h2>
			<?php 
				$obj=tienemulta($_POST['btnvermulta'],$saludo["dni"]);
				if($obj==false)
				{
					echo "<p id='nohay'>No se han encontrado multas pendientes.</p>";
				}
				else
				{
					if(isset($_POST['btnvermulta']))
					{
						vercadamultavehiculo($_POST['btnvermulta'],$saludo["dni"]);
					}
				}
				

			?>
			<form class='formvolver' action='vehiculos.php' method='post'>
				
				<button class='btnvolvervehiculos' name='btnvolver'>Volver</button>
			</form>
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
