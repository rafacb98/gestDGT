<?php
session_name('gestdgt+');
session_start();
require "../../funciones_servicios.php";

if (isset($_SESSION['usuario'])){

	?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Perfil | GestDGT+</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Rafael Carrillo Bonilla">
	<meta name="description" content="GestDGT+">
	<meta name="lang" content="es-ES" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="../../css/estilosperfil.css">
	<script src="https://kit.fontawesome.com/4a9d5317b6.js" crossorigin="anonymous"></script>
	<link rel="icon" href="../../img/logotipo.svg">
	<link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
	<script src='../../js/jquery-3.1.1.js'></script>
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
				<li><a id='seleccionado' href="perfil.php">VER PERFIL</a></li>
				<li><a href="../conductor/vehiculos.php">VER VEHICULOS</a></li>
       </ul>
		
		<img src="../../img/logotipo.svg" alt="logo" />
		<a href='../../cerrarsesion.php' class='cerrarsesion'><i class="fas fa-sign-out-alt"></i></a>
	</header>

	<main class="epico">
		<span class="botonsubir"><i class="fas fa-arrow-up"></i></span>
		<section>
			
			
			<h2>INFORMACIÓN PERSONAL</h2>
			<article>
				<?php
					verperfil($_SESSION['usuario']);
					vercarnes($_SESSION['usuario']);
				?>
			</article>

			<button id='masinfo'>Mas información</button>

			<article class='tiposdecarne'>	
				<p><span class='tipo'>AM:</span> ciclomotores de dos o tres ruedas y cuatriciclos ligeros. La edad mínima para obtenerlo será de quince años cumplidos.</p>
				<p><span class='tipo'>A1:</span> motocicletas con una cilindrada máxima de 125 cm³ y potencia máxima de 11 kW (algo menos de 15 cv). La edad mínima para obtenerlo será de dieciséis años cumplidos.</p>
				<p><span class='tipo'>A2:</span> motocicletas con una potencia máxima de 35 kW (algo menos de 47 cv). La edad mínima para obtenerlo será de dieciocho años cumplidos.</p>
				<p><span class='tipo'>A:</span> motocicletas y triciclos de motor. La edad mínima para obtenerlo será de veinte años cumplidos, veintiuno para el caso de triciclos.</p>
				<p><span class='tipo'>B:</span> automóviles cuya masa máxima autorizada no exceda de 3.500 kg que estén diseñados y construidos para el transporte de no más de 8 pasajeros además del conductor; conjuntos de vehículos acoplados compuestos por un vehículo tractor de los que autoriza a conducir el permiso de la clase B y un remolque cuya masa máxima autorizada exceda de 750 kg, siempre que la masa máxima autorizada del conjunto no exceda de 4.250 kg, sin perjuicio de las disposiciones que las normas de aprobación de tipo establezcan para estos vehículos; triciclos y cuatriciclos de motor y la edad mínima para obtenerlo será de dieciocho años cumplidos.</p>
				<p><span class='tipo'>B + E:</span> conjuntos de vehículos acoplados compuestos por un vehículo tractor de los que autoriza a conducir el permiso de la clase B y un remolque o semirremolque cuya masa máxima autorizada no exceda de 3500 kg. La edad mínima para obtenerlo será de dieciocho años cumplidos.</p>
				<p><span class='tipo'>C1:</span> automóviles distintos de los que autoriza a conducir el permiso de las clases D1 o D, cuya masa máxima autorizada exceda de 3500 kg y no sobrepase los 7500 kg. La edad mínima para obtenerlo será de dieciocho años cumplidos.</p>
				<p><span class='tipo'>C1 + E:</span> conjuntos de vehículos acoplados compuestos por un vehículo tractor de los que autoriza a conducir el permiso de la clase C1 y un remolque o semirremolque cuya masa máxima autorizada exceda de 750 kg, siempre que la masa máxima autorizada del conjunto así formado no exceda de 12.000 kg; conjuntos de vehículos acoplados compuestos por un vehículo tractor de los que autoriza a conducir el permiso de la clase B y un remolque o semirremolque cuya masa máxima autorizada exceda de 3.500 kg, siempre que la masa máxima autorizada del conjunto no exceda de 12.000 kg, sin perjuicio de las disposiciones que las normas de aprobación de tipo establezcan para estos vehículos; y la edad mínima para obtenerlo será de dieciocho años cumplidos.</p>
				<p><span class='tipo'>C:</span> automóviles distintos de los que autoriza a conducir el permiso de las clases D1 o D, cuya masa máxima autorizada exceda de 3500 kg. La edad mínima para obtenerlo será de veintiún años cumplidos.
				<p><span class='tipo'>C + E:</span> conjuntos de vehículos acoplados compuestos por un vehículo tractor de los que autoriza a conducir el permiso de la clase C y un remolque o semirremolque cuya masa máxima autorizada exceda de 750 kg. La edad mínima para obtenerlo será de veintiún años cumplidos.</p>
				<p><span class='tipo'>D1:</span> automóviles diseñados y construidos para el transporte de no más de 16 pasajeros además del conductor y cuya longitud máxima no exceda de 8 metros. La edad mínima para obtenerlo será de veintiún años cumplidos.</p>
				<p><span class='tipo'>D1 + E:</span> conjuntos de vehículos acoplados compuestos por un vehículo tractor de los que autoriza a conducir el permiso de la clase D1 y un remolque cuya masa máxima autorizada exceda de 750 kg. La edad mínima para obtenerlo será de veintiún años cumplidos.</p>
				<p><span class='tipo'>D:</span> autoriza para conducir automóviles diseñados y construidos para el transporte de más de ocho pasajeros además del conductor. La edad mínima para obtenerlo será de veinticuatro años cumplidos.</p>
				<p><span class='tipo'>D + E:</span> autoriza para conducir conjuntos de vehículos acoplados compuestos por un vehículo tractor de los que autoriza a conducir el permiso de la clase D y un remolque cuya masa máxima autorizada exceda de 750 kg. La edad mínima para obtenerlo será de veinticuatro años cumplidos.</p>
			</article>
				
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
