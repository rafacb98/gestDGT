<?php
session_name('gestdgt+');
session_start();
require "../../funciones_servicios.php";

if (isset($_SESSION['usuario'])){

	?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Multas | GestDGT+</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Rafael Carrillo Bonilla">
	<meta name="description" content="GestDGT+">
	<meta name="lang" content="es-ES" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="../../css/estilosmultas.css">
	<link rel="stylesheet" type="text/css" href="../../css/basictable.css">
	<script src="https://kit.fontawesome.com/4a9d5317b6.js" crossorigin="anonymous"></script>
	<link rel="icon" href="../../img/logotipo.png">
	<link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One&display=swap" rel="stylesheet">
	<script src='../../js/jquery-3.1.1.js'></script>
	<script src='../../js/jquery.basictable.js'></script>
	<script src="../../js/sweetalert.min.js"></script>
	<script src='../../js/scriptgeneral2.js'></script>
	<script src='../../js/scriptmultas.js'></script>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
				<li><a id='seleccionado' href="multas.php">Multas</a></li>
       </ul>
		
		<img src="../../img/logotipo.png" alt="logo" />
	</header>

	<main class="epico">
		<span class="botonsubir"><i class="fas fa-arrow-up"></i></span>
		<section id="a">
			<?php
				$saludo=obtener_usuario($_SESSION['usuario'],$_SESSION['clave']);
			?>
			<p class='primero'><span class='bienvenida'>¡Hola <span class='usuario'><?php echo $saludo['nombre'];?></span>!</span><a  href='../../cerrarsesion.php' class='cerrarsesion'><i class="fas fa-sign-out-alt"></i></a></p>
			<h2>·· GESTIÓN DE MULTAS ··</h2>
		
			<form action='nuevamulta.php' method='post'>
				<button class='btnnueva' name='btnnuevamulta'><i class="fas fa-plus-circle"></i></button><span id='nuevam'>&nbsp;&nbsp;&nbsp;&nbsp;NUEVA MULTA</span>
			</form>	

			<?php 
			if(isset($_SESSION['mensajito']))
			{
				if($_SESSION['mensajito']=="insertado")
				{
					echo "<script>swal('¡Bien!', 'Multa añadida con éxito', 'success')</script>";
					
				}	
				unset($_SESSION['mensajito']);
			}
			
				

		
			todasmultas(); 

			?>
			
			<?php
			if(isset($_POST['btneditar']))
			{
				//echo $_POST['btneditar']."<br/>";
				$fechahora= substr($_POST['btneditar'],0,19);
				$dni= substr($_POST['btneditar'],20,9);
				$matricula= substr($_POST['btneditar'],30,7);
				
				$obj=verinfomulta($fechahora,$dni,$matricula);
				
				
			?>



				<div class="fondo">
					<span class="helper"></span>
					<div>
						<div class="popupcerrar">&times;</div>
						<h2>Modificar multa</h2>
						<form action='#' method='post'>
						<p><?php echo "Estado:" .$obj->estado;?></p>
						<button name='btnmodificar'>Modificar</button>
						</form>
					</div>
				</div>

<?php

				
			}
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
