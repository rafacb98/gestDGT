<?php
session_name('gestdgt+');
session_start();
require "../../funciones_servicios.php";


	
	$errorfechayhora=true;
    $errorprecio=true;    
    $estado=true;
    $observaciones=true;
	$dniconductor=true;
	$matriculavehiculo=true;
    

	if(isset($_POST['btnaniadirnuevamulta']))
	{
	
		$errorfechayhora=$_POST['fechahora']=="";
		$errorprecio=$_POST['precio']=="";
		$estado=$_POST['estado']=="";
		$observaciones=$_POST['obs']=="";
		$dniconductor=$_POST['dniconductor']=="";
		$matriculavehiculo=$_POST['matricula']=="";
	

		$errorTotal=(!$errorfechayhora && !$errorprecio && !$estado && !$observaciones && !$dniconductor && !$matriculavehiculo);

		if($errorTotal)
		{
			
			multasinfoto($_POST['fechahora'],$_POST['precio'],$_POST['estado'],$_POST['obs'],$_POST['dniconductor'],$_POST['matricula']);
					
		}
					
                
	}
	?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Nueva multa | GestDGT+</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Rafael Carrillo Bonilla">
	<meta name="description" content="GestDGT+">
	<meta name="lang" content="es-ES" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="../../css/estilosnuevamulta.css">
	<link rel="stylesheet" type="text/css" href="../../css/basictable.css">
	<script src="https://kit.fontawesome.com/4a9d5317b6.js" crossorigin="anonymous"></script>
	<link rel="icon" href="../../img/logotipo3png.png">
	<link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One&display=swap" rel="stylesheet">
	<script src='../../js/jquery-3.1.1.js'></script>
	<script src='../../js/scriptgeneral.js'></script>
	<script src='../../js/jquery.basictable.min.js'></script>

	
		

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
		
		<img src="../../img/logotipo3png.png" alt="logo" />
	</header>

	<main class="epico">
		<span class="botonsubir"><i class="fas fa-arrow-up"></i></span>
		<section id="a">
			<p class='primero'><span class='bienvenida'>¡Hola <span class='usuario'><?php echo $_SESSION['usuario'];?></span>!</span><a  href='../../cerrarsesion.php' class='cerrarsesion'><i class="fas fa-sign-out-alt"></i></a></p>
			<h2>·· Nueva multa ··</h2>
			
			<form action='nuevamulta.php' method='post'>
				<div class="contenidolargo">
					<div class="contenidocorto">
						<label for="matricula">Matricula</label>
						<input id="matricula" type="text" name="matricula" value="<?php if(isset($_POST["matricula"])) echo $_POST["matricula"];?>"/>
						<?php
						
                        if(isset($_POST["btnaniadirnuevamulta"]) && $_POST["matricula"]=="") echo "<p class='erroraniadir'>Por favor, rellene el campo</p>";
					?>
					</div>
					<div class="contenidocorto">
						<label for="dniconductor">DNI Conductor</label>
						<input for="dniconductor" type="text" name="dniconductor" value="<?php if(isset($_POST["dniconductor"])) echo $_POST["dniconductor"];?>"/>
						<?php
						
                        if(isset($_POST["btnaniadirnuevamulta"]) && $_POST["dniconductor"]=="") echo "<p class='erroraniadir'>Por favor, rellene el campo</p>";
					?>
					</div>
					<div class="contenidocorto">
						<label for="fechahora">Fecha/Hora</label>
						<input for="fechahora" type="datetime-local" name="fechahora" value="<?php if(isset($_POST["fechahora"])) echo $_POST["fechahora"];?>"/>
						<?php
						
                        if(isset($_POST["btnaniadirnuevamulta"]) && $_POST["fechahora"]=="") echo "<p class='erroraniadir'>Por favor, rellene el campo</p>";
					?>
					</div>
					<div class="contenidocorto">
						<label for="precio">Precio</label>
						<input for="precio" type="number" name="precio" value="<?php if(isset($_POST["precio"])) echo $_POST["precio"];?>"/>
						<?php
						
                        if(isset($_POST["btnaniadirnuevamulta"]) && $_POST["precio"]=="") echo "<p><p class='erroraniadir'>Por favor, rellene el campo</p></p>";
					?>
					</div>
					<div class="contenidocorto">
						<label for="estado">Estado</label>
						<select name="estado" id="estado">
							<option value="en tramite">En trámite</option>
							<option value="tramitada">Tramitada</option>
							<option value="pagada">Pagada</option>
							<option value="finalizada">Finalizada</option>
						</select>
					</div>
					<div class="textarea">
						<label for="obs">Observaciones</label>
						<textarea id="obs" type="text" name="obs"><?php if(isset($_POST["obs"])) echo $_POST["obs"];?></textarea>
						<?php
						
                        if(isset($_POST["btnaniadirnuevamulta"]) && $_POST["obs"]=="") echo "<p class='erroraniadir'>Por favor, rellene el campo</p>";
					?>
					</div>	
					<div id=contenidocortoespecial>
						<label for="foto">Foto</label>
						<input for="foto" type="file" name="foto"/>
					</div>
					<button class='btnnueva' name='btnaniadirnuevamulta' type="submit">Añadir</button>
					<button class='btnnueva2' name='btncancelarnuevamulta' type="submit" formaction='multas.php'>Cancelar</button>
				</div>
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

	 ?>
