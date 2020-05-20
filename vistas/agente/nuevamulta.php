<?php
session_name('gestdgt+');
session_start();
require "../../funciones_servicios.php";


	
	$errorfechayhora=true;
    $errorprecio=true;    
    $errorestado=true;
    $errorobservaciones=true;
	$errordniconductor=true;
	$errormatriculavehiculo=true;
    

	if(isset($_POST['btnaniadirnuevamulta']))
	{
	
		$errorfechayhora=$_POST['fechahora']=="";
		$errorprecio=$_POST['precio']=="";
		$errorobservaciones=$_POST['obs']=="";
		$errordniconductor=($_POST['dniconductor']=="" || !validardni($_POST['dniconductor']));
		$errormatriculavehiculo=$_POST['matricula']=="";
		

		$errorTotal=(!$errorfechayhora && !$errorprecio && !$errorobservaciones && !$errordniconductor && !$errormatriculavehiculo);

		if($errorTotal)
		{
			if(isset($_FILES['foto']['name']) && $_FILES['foto']['name']!="") 
			{
				$arr=explode(".",$_FILES['foto']['name']);
				$extension=end($arr);
				$fechahora=str_replace(":","_",$_POST['fechahora']);
				$nombre_unico=$_POST['dniconductor']."_".$_POST['matricula']."_".$fechahora;
				$nombrecompleto=$nombre_unico.".".$extension;
				@$var=move_uploaded_file($_FILES['foto']['tmp_name'],"../../img/fotos_multa/".$nombrecompleto);
				
				multaconfoto($_POST['fechahora'],$_POST['precio'],$_POST['estado'],$_POST['obs'],$nombrecompleto,$_POST['dniconductor'],$_POST['matricula']);
				
			
				
				
			}
			else
			{
				
				multasinfoto($_POST['fechahora'],$_POST['precio'],$_POST['estado'],$_POST['obs'],$_POST['dniconductor'],$_POST['matricula']);
				
			}
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
	<script src="https://kit.fontawesome.com/4a9d5317b6.js" crossorigin="anonymous"></script>
	<link rel="icon" href="../../img/logotipo.png">
	<link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One&display=swap" rel="stylesheet">
	<script src='../../js/jquery-3.1.1.js'></script>
	<script src='../../js/jquery-input-file-text.js'></script>
	<script src='../../js/scriptgeneral.js'></script>
	<script src='../../js/scriptnuevamulta.js'></script>


	
		

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
			<h2>·· Nueva multa ··</h2>
			
			<form action='nuevamulta.php' method='post' enctype="multipart/form-data">
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
						if(isset($_POST["btnaniadirnuevamulta"]) && $errordniconductor) 
						{
							if ($_POST["dniconductor"]=="")
								echo "<p class='erroraniadir'>Por favor, rellene el campo</p>";
							else
								echo "<p class='erroraniadir'>Por favor, introduzca un DNI válido</p>";	
						}
				
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
						<input for="foto" type="file" name="foto" />
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
