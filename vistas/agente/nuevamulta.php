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
	$errorterminos=true;
    

	if(isset($_POST['btnaniadirnuevamulta']))
	{
	
		$errorfechayhora=$_POST['fechahora']=="";
		$errorprecio=$_POST['precio']=="";
		$errorobservaciones=$_POST['obs']=="";
		$errordniconductor=($_POST['dniconductor']=="" || !validardni($_POST['dniconductor']));
		$errormatriculavehiculo=$_POST['matricula']=="";
		$errorterminos=empty($_POST['terminos']);
		

		$errorTotal=(!$errorfechayhora && !$errorprecio && !$errorobservaciones && !$errordniconductor && !$errormatriculavehiculo && !$errorterminos);
	
		if($errorTotal)
		{
			if(isset($_FILES['foto']['name']) && $_FILES['foto']['name']!="") 
			{
				$arr=explode(".",$_FILES['foto']['name']);
				$extension=end($arr);
				$fechahora=str_replace(":","_",$_POST['fechahora']);
				$fechahora2=str_replace("/","_",$fechahora);
				$nombre_unico=$_POST['dniconductor']."_".$_POST['matricula']."_".$fechahora2;
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
	<link rel="stylesheet" type="text/css" href="../../css/jquery.datetimepicker.css">
	<script src="https://kit.fontawesome.com/4a9d5317b6.js" crossorigin="anonymous"></script>
	<link rel="icon" href="../../img/logotipo.svg">
	<link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
	<script src='../../js/jquery-3.1.1.js'></script>
	<script src='../../js/jquery-input-file-text.js'></script>
	<script src="../../js/sweetalert.min.js"></script>
	<script src='../../js/scriptgeneral.js'></script>
	<script src='../../js/scriptnuevamulta.js'></script>
	<script src='../../js/jquery.datetimepicker.full.js'></script>
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
					<li><a href="perfil.php">VER PERFIL</a></li>
					<li><a href="multas.php">GESTIONAR MULTAS</a></li>
					<li><a id='seleccionado' href="nuevamulta.php">NUEVA MULTA</a></li>
       </ul>
		
	   <a class='enlace' href='../..'><img src="../../img/logotipo.svg" alt="logo" /></a>
		<a href='../../cerrarsesion.php' class='cerrarsesion'><p class='cerrarsesionescritorio'>Cerrar sesión</p><i class="fas fa-sign-out-alt"></i></a>
	</header>

	<main class="epico">
	<?php 
			if(isset($_SESSION['mensajito']))
			{
				
				if($_SESSION['mensajito']=="noinsertado")
				{
					echo "<script>swal('¡Lo sentimos!', 'No se puedo insertar la multa porque el DNI o vehículo no se encuentran registrados', 'error')</script>";
					
				}	
					
				unset($_SESSION['mensajito']);
			}
			

			?>
			
		<span class="botonsubir"><i class="fas fa-arrow-up"></i></span>
		<section id="a">
			
			<h2>Nueva multa</h2>
			
			<form action='nuevamulta.php' method='post' enctype="multipart/form-data">
				<div class="contenidolargo">
					<div class="contenidocorto">
						<label for="matricula">Matricula</label>
						<input title="El formato es 1234ABC" pattern="[0-9]{4}[A-Z]{3}" id="matricula" type="text" name="matricula" value="<?php if(isset($_POST["matricula"])) echo $_POST["matricula"];?>"/>
						<?php
						
                        if(isset($_POST["btnaniadirnuevamulta"]) && $_POST["matricula"]=="") echo "<p class='erroraniadir'>Por favor, rellene el campo</p>";
					?>
					</div>
					<div class="contenidocorto">
						<label for="dniconductor">DNI Conductor</label>
						<input  title="El formato es 12345678A" pattern="(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))" id="dniconductor" type="text" name="dniconductor" value="<?php if(isset($_POST["dniconductor"])) echo $_POST["dniconductor"];?>"/>
						<?php
						if(isset($_POST["btnaniadirnuevamulta"]) && $errordniconductor) 
						{
							if ($_POST["dniconductor"]=="")
								echo "<p class='erroraniadir'>Por favor, rellene el campo</p>";
							else
							{
								
									echo "<p class='erroraniadir'>Por favor, introduzca un DNI válido</p>";
								
							}
								
							
								
						}
				
					?>
					</div>
					<div class="contenidocorto">
						<label for="fechahora">Fecha/Hora</label>
						<input id="fechahora" type="text" name="fechahora" value="<?php if(isset($_POST["fechahora"])) echo $_POST["fechahora"];?>"/>
						<?php
						
                        if(isset($_POST["btnaniadirnuevamulta"]) && $_POST["fechahora"]=="") echo "<p class='erroraniadir'>Por favor, rellene el campo</p>";
					?>
					</div>
					<div class="contenidocorto">
						<label for="precio">Precio</label>
						<input id="precio" type="number" name="precio" value="<?php if(isset($_POST["precio"])) echo $_POST["precio"];?>"/>
						<?php
						
                        if(isset($_POST["btnaniadirnuevamulta"]) && $_POST["precio"]=="") echo "<p><p class='erroraniadir'>Por favor, rellene el campo</p></p>";
					?>
					</div>
					<div class="contenidocorto">
						<label for="estado">Estado</label>
						<select name="estado" id="estado">
							<option value="En tramite">En trámite</option>
							<option value="Tramitada">Tramitada</option>
							<option value="Pagada">Pagada</option>
							<option value="Finalizada">Finalizada</option>
						</select>
					</div>
						
					<div id=contenidocortoespecial>
						<label for="foto">Foto</label>
						<input id="foto" type="file" name="foto" accept=".png, .jpg, .jpeg" />
						
						
					</div>
					<div class="textarea">
						<label for="obs">Observaciones</label>
						<textarea id="obs" type="text" name="obs"><?php if(isset($_POST["obs"])) echo $_POST["obs"];?></textarea>
						<?php
						
                        if(isset($_POST["btnaniadirnuevamulta"]) && $_POST["obs"]=="") echo "<p class='erroraniadir'>Por favor, rellene el campo</p>";
					?>
					</div>
					<div class="contenidoterminos">
						
						<label for="terminos"><input class='terminos' value='si' type="checkbox" name="terminos" id="terminos" />He leido y acepto la <a href='terminosyprivacidad.php'>política de privacidad</a> y los <a href='terminosyprivacidad.php'>términos y condiciones</a></label>
						<?php
						
                        if(isset($_POST["btnaniadirnuevamulta"]) && empty($_POST['terminos'])) echo "<p class='erroraniadir'>Por favor, acepte los términos</p>";
					?>
					</div>
					<button class='btnnueva2' name='btncancelarnuevamulta' type="submit" formaction='multas.php'>Cancelar</button>
					<button class='btnnueva' name='btnaniadirnuevamulta' type="submit">Añadir</button>
					
				</div>
			</form>	

			
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

	 ?>
