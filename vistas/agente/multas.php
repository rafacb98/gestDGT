<?php
session_name('gestdgt+');
session_start();
require "../../funciones_servicios.php";

if (isset($_SESSION['usuario'])){

	if(isset($_POST['btntramitada']))
	{
		$fechahora_t= substr($_POST['btntramitada'],0,19);
		$dni_t= substr($_POST['btntramitada'],20,9);
		$matricula_t= substr($_POST['btntramitada'],30,7);
			multatramitada($fechahora_t,$dni_t,$matricula_t,"tramitada");
	}
	if(isset($_POST['btnpagada']))
	{
		$fechahora_p= substr($_POST['btnpagada'],0,19);
		$dni_p= substr($_POST['btnpagada'],20,9);
		$matricula_p= substr($_POST['btnpagada'],30,7);
			multatramitada($fechahora_p,$dni_p,$matricula_p,"pagada");
	}
	if(isset($_POST['btnfinalizada']))
	{
		$fechahora_f= substr($_POST['btnfinalizada'],0,19);
		$dni_f= substr($_POST['btnfinalizada'],20,9);
		$matricula_f= substr($_POST['btnfinalizada'],30,7);
			multatramitada($fechahora_f,$dni_f,$matricula_f,"finalizada");
	}
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
	<link rel="icon" href="../../img/logotipo.svg">
	<link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
	<script src='../../js/jquery-3.1.1.js'></script>
	<script src='../../js/jquery.basictable.js'></script>
	<script src="../../js/sweetalert.min.js"></script>
	<script src='../../js/scriptgeneral.js'></script>
	<script src='../../js/scriptmultas.js'></script>	
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
					<li><a  href="perfil.php">VER PERFIL</a></li>
					<li><a id='seleccionado' href="multas.php">GESTIONAR MULTAS</a></li>
       </ul>
		
		<img src="../../img/logotipo.svg" alt="logo" />
		<a href='../../cerrarsesion.php' class='cerrarsesion'><i class="fas fa-sign-out-alt"></i></a>
	</header>

	<main class="epico">
		<span class="botonsubir"><i class="fas fa-arrow-up"></i></span>
		<section id="a">
			
			<h2>GESTIÓN DE MULTAS</h2>
		
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
				if($_SESSION['mensajito']=="actualizado")
				{
					echo "<script>swal('¡Bien!', 'Se ha actualizado el estado de la multa', 'success')</script>";
					
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
						<form action='#editaryasi' method='post'>
						<p>Fecha/Hora: <?php echo $obj->fecha_y_hora;?></p>
						<p>DNI: <?php echo $obj->dni_conductor;?></p>
						<p>Matricula: <?php echo $obj->matricula_vehiculo;?></p>
						<button class='btneditarestado' name='btntramitada' value='<?php echo $_POST['btneditar'];?>' <?php if($obj->estado=="tramitada") echo "disabled";?>>Tramitada</button>
						<button class='btneditarestado' name='btnpagada' value='<?php echo $_POST['btneditar'];?>' <?php if($obj->estado=="pagada") echo "disabled";?>>Pagada</button>
						<button class='btneditarestado' name='btnfinalizada' value='<?php echo $_POST['btneditar'];?>' <?php if($obj->estado=="finalizada") echo "disabled";?>>Finalizada</button>
						
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
