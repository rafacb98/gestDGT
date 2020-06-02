<?php
require "../../REST/conexionbd.php";
$conn=conectar();

    if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
    }

    $salida = "";

    $consulta = "SELECT * FROM multa WHERE fecha_y_hora NOT LIKE '' ORDER By fecha_y_hora";

    if (isset($_POST['consulta'])) {
    	$escrito = $conn->real_escape_string($_POST['consulta']);
    	$consulta = "SELECT * FROM multa WHERE fecha_y_hora LIKE '%$escrito%' OR estado LIKE '%$escrito%' OR precio LIKE '%$escrito%' OR observaciones LIKE '%$escrito%' OR dni_conductor LIKE '$escrito' OR matricula_vehiculo LIKE '$escrito' ";
    }

    $resultado = $conn->query($consulta);

    if ($resultado->num_rows>0) {
        $salida.= "<h2>GESTIÓN DE MULTAS</h2>";
        
    			

    	while ($fila = $resultado->fetch_assoc()) {
            $salida.="<article class='especial'>
            <img src='../../img/fotos_multa/".$fila['foto']."' />
            <div class='contenidomulta'>
            <p>Fecha/Hora: <input readonly type='text' value='". $fila['fecha_y_hora'] . "'/></p>
            <p>DNI: <input readonly type='text' value='". $fila['dni_conductor'] . "'/></p>
            <p>Matricula: <input readonly type='text' value='". $fila['matricula_vehiculo'] . "'/></p>
            <p>Precio: <input readonly type='text' value='". $fila['precio'] . "'/></p>
            <p>Estado: <input readonly type='text' value='". $fila['estado']. "'/></p>";
            $salida.="<p>Observaciones: <textarea readonly>".$fila['observaciones']."</textarea></p> 
            <form method='post' action='editarmultas.php'><button class='edita btnnueva' name='btneditar' value='".$fila['fecha_y_hora']."-".$fila['dni_conductor']."-".$fila['matricula_vehiculo']."'><i class='fas fa-pencil-alt'></i></button></form>
           </div>";
           $salida.="</article>";		

    	}
    	
    }else{
    	$salida.="<p class='sinresultados'>Sin resultados..</p>";
    }


    echo $salida;

    $conn->close();


   
   
    
?>