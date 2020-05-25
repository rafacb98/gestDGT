<?php
session_name('gestdgt+');
session_start();
require "../../funciones_servicios.php";

if (isset($_SESSION['usuario'])){

		if(isset($_POST['btneliminar']))
			
				quitarvehiculo($_POST['btneliminar']);
						
				
			
	?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Vehículos | GestDGT+</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Rafael Carrillo Bonilla">
	<meta name="description" content="GestDGT+">
	<meta name="lang" content="es-ES" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="../../css/estilosvehiculos.css">
	<script src="https://kit.fontawesome.com/4a9d5317b6.js" crossorigin="anonymous"></script>
	<link rel="icon" href="../../img/logotipo.png">
	<link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One&display=swap" rel="stylesheet">
	<script src='../../js/jquery-3.1.1.js'></script>
	<script src="../../js/sweetalert.min.js"></script>
	<script src='../../js/scriptgeneral2.js'></script>
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
	   			<li><a href="../..">Inicio</a></li>
				<li><a href="perfil.php">Perfil</a></li>
				<li><a id='seleccionado' href="vehiculos.php">Vehiculos</a></li>
       </ul>
	
		<img src="../../img/logotipo.png" alt="logo" />
	</header>

	<main>
		<span class="botonsubir"><i class="fas fa-arrow-up"></i></span>
		<section>
			<?php
				$saludo=obtener_usuario($_SESSION['usuario'],$_SESSION['clave']);
			?>
			<p class='primero'><span class='bienvenida'>¡Hola <span class='usuario'><?php echo $saludo['nombre'];?></span>!</span><a  href='../../cerrarsesion.php' class='cerrarsesion'><i class="fas fa-sign-out-alt"></i></a></p>
			<h2>·· VEHÍCULOS ··</h2>
			<?php 
				if(isset($_SESSION['mensajito']))
				{
					if($_SESSION['mensajito']=="eliminado")
					{
						echo "<script>swal('¡Bien!', 'Se ha eliminado el vehiculo', 'success')</script>";		
					}	
					unset($_SESSION['mensajito']);
				}

				vertotalvehiculos($_SESSION['usuario']); 
				vercadavehiculo($_SESSION['usuario']);

				

			?>
		
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
