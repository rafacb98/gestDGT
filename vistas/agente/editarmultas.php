<?php
session_name('gestdgt+');
session_start();
require "../../funciones_servicios.php";

if (isset($_SESSION['usuario'])){
	if(isset($_POST['btnactualizarestado']))
	{
				$fechahora= substr($_POST['btnactualizarestado'],0,19);
				$dni= substr($_POST['btnactualizarestado'],20,9);
				$matricula= substr($_POST['btnactualizarestado'],30,7);

				modificarestadomulta($fechahora,$dni,$matricula,$_POST['estadoeditar']);
	}
	
	?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Editar multa | GestDGT+</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Rafael Carrillo Bonilla">
	<meta name="description" content="GestDGT+">
	<meta name="lang" content="es-ES" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="../../css/estilosmultas.css">
	<script src="https://kit.fontawesome.com/4a9d5317b6.js" crossorigin="anonymous"></script>
	<link rel="icon" href="../../img/logotipo.svg">
	<link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
	<script src='../../js/jquery-3.1.1.js'></script>
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
					<li><a href="nuevamulta.php">NUEVA MULTA</a></li>
       </ul>
		
		<img src="../../img/logotipo.svg" alt="logo" />
		<a href='../../cerrarsesion.php' class='cerrarsesion'><i class="fas fa-sign-out-alt"></i></a>
	</header>

	<main class="epico">
		<span class="botonsubir"><i class="fas fa-arrow-up"></i></span>
		<section id="a">
			
			<h2>MODIFICACIÓN DE MULTAS</h2>
		
			<?php
			
				//echo $_POST['btneditar']."<br/>";
				$fechahora= substr($_POST['btneditar'],0,19);
				$dni= substr($_POST['btneditar'],20,9);
				$matricula= substr($_POST['btneditar'],30,7);
				
				$obj=verinfomulta($fechahora,$dni,$matricula);
					
			?>
	

						<form action='editarmultas.php' method='post'>
							<fieldset>
								<legend>Datos del infractor</legend>
								<?php
									infovehiculomultado($matricula);

								?>
							</fieldset>
						</form>

						
						<form action='editarmultas.php' method='post'>
							<fieldset>
								<legend>Datos del vehiculo</legend>
								<?php
									infoconductormultado($dni);

								?>
							</fieldset>
						</form>
						<?php
							$fecha=substr($obj->fecha_y_hora,0,11);
							$hora=substr($obj->fecha_y_hora,11,19);
						?>
						<form action='editarmultas.php' method='post'>
							<fieldset>
								<legend>Datos de la multa</legend>
								<p>Fecha/Hora: <input readonly type='text' value=<?php echo $hora."/".$fecha;?> /></p>
								<p>Matricula: <input readonly type='text' value=<?php echo $obj->matricula_vehiculo;?> /></p>
								<p>DNI: <input readonly type='text' value=<?php echo $obj->dni_conductor;?> /></p>
								<p>Estado: <select name='estadoeditar'>
								<option value='en tramite' <?php //if (isset($_POST['emultas']) && $_POST['emultas']==$obj->estado) echo "selected";?>>en tramite</option>
								<option value='tramitada' <?php //if (isset($_POST['emultas']) && $_POST['emultas']==$obj->estado) echo "selected";?>>tramitada</option>
								<option value='pagada' <?php //if (isset($_POST['emultas']) && $_POST['emultas']==$obj->estado) echo "selected";?>>pagada</option>
								<option value='finalizada' <?php //if (isset($_POST['emultas']) && $_POST['emultas']==$obj->estado) echo "selected";?>>finalizada</option>
								
								</select></p>
								<?php
								//echo "<p>Foto: <img src='../../img/fotos_multa/".$obj->foto."' /></p>";
								?>
								<button formaction='multas.php' class='btnvolver' name='btnvolver'>Volver</button>
								<button class='btnactualizarestado' name='btnactualizarestado' value='<?php echo $_POST['btneditar']?>'>Actualizar</button>
							</fieldset>
						</form>
					
			

			<?php


				
			
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
