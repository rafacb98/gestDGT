<?php
define("ruta","http://localhost/gestDGT/REST/");
define('MINUTOS',20);

function consumir_servicio_REST($url, $metodo, $datos = null)
{
    $llamada = curl_init();
    curl_setopt($llamada, CURLOPT_URL, $url);
    curl_setopt($llamada, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, $metodo);
    if (isset($datos))
        curl_setopt($llamada, CURLOPT_POSTFIELDS, http_build_query($datos));

    $response = curl_exec($llamada);
    curl_close($llamada);
    if (!$response)
        die("Error consumiendo el servicio Web: " . $url);
    $decodeText = substr($response, 3, strlen($response) - 1);
    return json_decode($decodeText);
}


function obtener_usuario($dni,$clave)
{
    $datosPost=['usuario'=>$dni,'clave'=>$clave];
 
    $obj=consumir_servicio_REST(ruta."login","POST",$datosPost);
  
    if(isset($obj->mensaje_error))
        die($obj->mensaje_error);
    else if(isset($obj->mensaje))
        return false;
    else
    {
        $datos["dni"]=$obj->usuario->dni;
        $datos["clave"]=$obj->usuario->clave;
        $datos["nombre"]=$obj->usuario->nombre;
        $datos["apellidos"]=$obj->usuario->apellidos;
        $datos["anio_exp_carne"]=$obj->usuario->anio_exp_carne;
        $datos["n_carne"]=$obj->usuario->n_carne;
        $datos["puntos"]=$obj->usuario->puntos;
        $datos["direccion"]=$obj->usuario->direccion;
        $datos["telefono"]=$obj->usuario->telefono;
        $datos["n_placa"]=$obj->usuario->n_placa;
        $datos["tipo"]=$obj->usuario->tipo;
        

        return $datos; 
    }
}

function verpuntos($dni)
{
    $obj=consumir_servicio_REST(ruta."puntos/".urlencode($dni),"GET");
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
    else
    {
        echo "<p id='numeropuntos'>".$obj->dni->puntos."</p>";        
    }
}

function vernplaca($dni)
{
    $obj=consumir_servicio_REST(ruta."nplaca/".urlencode($dni),"GET");
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
    else
    {
        echo "<p id='numeropuntos'>".$obj->dni->n_placa."</p>";        
    }
}


function verperfil($dni)
{
    $obj=consumir_servicio_REST(ruta."perfil/".urlencode($dni),"GET");
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
    else
    { 
        echo "<p>Nombre:<span class='datos'><input type='text' readonly value='".$obj->dni->nombre."'/></span></p>";
        echo "<p>Apellidos:<span class='datos'><input readonly type='text' value='".$obj->dni->apellidos."'/></span></p>";
        echo "<p>DNI:<span class='datos'><input readonly type='text' value='".$obj->dni->dni."'/></span></p>";
        echo "<p>Dirección:<span class='datos'><input type='text' readonly value='".$obj->dni->direccion."'/></span></p>";
        echo "<p>Teléfono:<span class='datos'><input type='text' readonly value='".$obj->dni->telefono."'/></span></p>";
        echo "<p>Número de carné:<span class='datos'><input type='text' readonly value='".$obj->dni->n_carne."'/></span></p>";
        echo "<p class='espe'>Año expedición de carné:<span class='datos'><input type='text' readonly value='".$obj->dni->anio_exp_carne."'/></span></p>";
        //echo "<p class='espe'>Tipo de carné:<span class='datos'> ".$obj->dni->descripcion."</span></p>";
        
           
    }
}

function verperfil2($dni)
{
    $obj=consumir_servicio_REST(ruta."perfil/".urlencode($dni),"GET");
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
    else
    { 
        echo "<p>Nombre:<span class='datos'><input type='text' readonly value='".$obj->dni->nombre."'/></span></p>";
        echo "<p>Apellidos:<span class='datos'><input readonly type='text' value='".$obj->dni->apellidos."'/></span></p>";
        echo "<p>Número de placa:<span class='datos'><input readonly type='text' value='".$obj->dni->n_placa."'/></span></p>";
        echo "<p>DNI:<span class='datos'><input readonly type='text' value='".$obj->dni->dni."'/></span></p>";
        echo "<p>Dirección:<span class='datos'><input type='text' readonly value='".$obj->dni->direccion."'/></span></p>";
        echo "<p>Teléfono:<span class='datos'><input type='text' readonly value='".$obj->dni->telefono."'/></span></p>";
        echo "<p>Número de carné:<span class='datos'><input type='text' readonly value='".$obj->dni->n_carne."'/></span></p>";
        echo "<p class='espe'>Año expedición de carné:<span class='datos'><input type='text' readonly value='".$obj->dni->anio_exp_carne."'/></span></p>";
        //echo "<p class='espe'>Tipo de carné:<span class='datos'> ".$obj->dni->descripcion."</span></p>";
        
           
    }
}

function vercarnes($dni)
{
    $obj=consumir_servicio_REST(ruta."carnes/".urlencode($dni),"GET");
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
    else
    { 
        echo "<p class='espe'>Tipo de carné:";
        foreach($obj->dni as $fila)
        {
            
                echo "<span class='datos'><input class='tipocar' readonly type='text' value='".$fila->descripcion."'/></span>";
          
        
        }
        echo "</p>";      
    }
}

function vertotalvehiculos($dni)
{
    $obj=consumir_servicio_REST(ruta."totalvehiculos/".urlencode($dni),"GET");
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
    else
    { 
        echo "<h3>Total(<span class='datos'>".$obj->dni->total."</span>)</h3>";
     
    }
}

function vercadavehiculo($dni)
{
    $obj=consumir_servicio_REST(ruta."vehiculosusu/".urlencode($dni),"GET");
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
    else
    { 
        
        foreach($obj->vehiculos as $fila)
        {
            echo "<article>";
                echo "<p><span class='detalle'>Matricula: </span><input readonly type='text' value='".$fila->matricula."'/> </p>";
                echo "<p><span class='detalle'>Bastidor: </span><input readonly type='text' value='".$fila->bastidor."'/></p>";
                echo "<p><span class='detalle'>Marca: </span><input readonly type='text' value='".$fila->marca."'/></p>";
                echo "<p><span class='detalle'>Modelo: </span><input readonly type='text' value='".$fila->modelo."'/></p>";
                echo "<p><span class='detalle'>Año: </span><input readonly type='text' value='".$fila->anio."'/></p>";
                echo "<p><span class='detalle'>Tipo: </span><input readonly type='text' value='".$fila->tipo."'/></p>";
                echo "<form action='multaspendientes.php' method='post'><button class='btnvermulta' name='btnvermulta' value='$fila->matricula'>Ver multas</button></form>";
            echo "</article>";
            
        }
          
    }
}


function todasmultas(){
    $obj=consumir_servicio_REST(ruta."multas","GET");
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
    else
    { 
        echo "<table id='multas'>";
        echo "<thead>";
            echo "<tr><th>Fecha/Hora</th><th>DNI</th><th>Matrícula</th><th>Precio</th><th>Estado</th><th>Observaciones</th><th>Foto</th><th id='opciones'>Opciones</th></tr>";
        echo "</thead>";
        echo "<tbody>";
      
        foreach($obj->multas as $fila)
        {
            echo "<tr>";
            echo "<td>". $fila->fecha_y_hora . "</td>"; 
            echo "<td>". $fila->dni_conductor . "</td>"; 
            echo "<td>". $fila->matricula_vehiculo . "</td>"; 
            echo "<td>". $fila->precio . "</td>"; 
            echo "<td>". $fila->estado . "</td>"; 
            echo "<td>". $fila->observaciones . "</td>"; 
            echo "<td><img src='../../img/fotos_multa/".$fila->foto."' /></td>"; 
            echo "<td><form method='post' action='#botonpavereditar'><button class='edita btnnueva' name='btneditar' value='".$fila->fecha_y_hora."-".$fila->dni_conductor."-".$fila->matricula_vehiculo."'><i class='fas fa-pencil-alt'></i></button></form></td>"; 
            echo  '</tr>';
        }
          echo "</tbody>";
          echo "</table>";
          
    }
}

function multasinfoto($fechayhora,$precio,$estado,$observaciones,$dniconductor,$matriculavehiculo)
{
    $datosMulta['fechahora']=$fechayhora;
    $datosMulta['precio']=$precio;
    $datosMulta['estado']=$estado;
    $datosMulta['obs']=$observaciones;
    $datosMulta['dniconductor']=$dniconductor;
    $datosMulta['matricula']=$matriculavehiculo;

    $obj=consumir_servicio_REST(ruta."nuevamultasinfoto","POST",$datosMulta);
    
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }

    else
    {
        $_SESSION['mensajito']="insertado";
        header("Location: ../agente/multas.php");
        exit;
    }

}

function multaconfoto($fechayhora,$precio,$estado,$observaciones,$foto,$dniconductor,$matriculavehiculo)
{
    $datosMulta['fechahora']=$fechayhora;
    $datosMulta['precio']=$precio;
    $datosMulta['estado']=$estado;
    $datosMulta['obs']=$observaciones;
    $datosMulta['foto']=$foto;
    $datosMulta['dniconductor']=$dniconductor;
    $datosMulta['matricula']=$matriculavehiculo;

    $obj=consumir_servicio_REST(ruta."nuevamultaconfoto","POST",$datosMulta);
   
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }

    else
    {
        $_SESSION['mensajito']="insertado";
        header("Location: ../agente/multas.php");
        exit;
    }

}

function validardni ($dni) 
{    
    $resp=false;
	$letra = substr($dni, -1);
	$numeros = substr($dni, 0, -1);
	if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
		$resp=true;
	}else{
		$resp=false;
	}
	return $resp;
}

function verinfomulta($fechahora,$dni,$matricula)
{
    $obj=consumir_servicio_REST(ruta."infomulta/".urlencode($fechahora)."/".urlencode($dni)."/".urlencode($matricula),"GET");	
 
    if(isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
          
      else if(isset($obj->mensaje))
      {
        return false;
      }
          
      else 
      {

        return $obj->multa;
      }
    
        
    
}



function multatramitada($fechahora,$dni,$matricula,$estado)
{
    $datosMulta['estado']=$estado;
        

    $obj=consumir_servicio_REST(ruta."actualizartramitada/".urlencode($fechahora)."/".urlencode($dni)."/".urlencode($matricula),"PUT",$datosMulta);
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
    else
    {
        $_SESSION['mensajito']="actualizado";
        header("Location: ../agente/multas.php");
        exit;

                
    } 
}

function multapagada($fechahora,$dni,$matricula,$estado)
{
    $datosMulta['estado']=$estado;
        

    $obj=consumir_servicio_REST(ruta."actualizarpagada/".urlencode($fechahora)."/".urlencode($dni)."/".urlencode($matricula),"PUT",$datosMulta);
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
    else
    {
        $_SESSION['mensajito']="actualizado";
        header("Location: ../agente/multas.php");
        exit;

                
    } 
}

function multafinalizada($fechahora,$dni,$matricula,$estado)
{
    $datosMulta['estado']=$estado;
        

    $obj=consumir_servicio_REST(ruta."actualizarfinalizada/".urlencode($fechahora)."/".urlencode($dni)."/".urlencode($matricula),"PUT",$datosMulta);
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
    else
    {
        $_SESSION['mensajito']="actualizado";
        header("Location: ../agente/multas.php");
        exit;

                
    } 
}



function actualizarclaveperfil($dni,$clave)
{
    $datosClave['clavenueva']=$clave;
        

    $obj=consumir_servicio_REST(ruta."actualizarclave/".urlencode($dni),"PUT",$datosClave);
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
    else
    {
        $_SESSION['mensajito']="actualizado";
        header("Location: ../conductor/perfil.php");
        exit;

                
    } 
}

function vercadamultavehiculo($matricula,$dni)
{
    $obj=consumir_servicio_REST(ruta."multavehiculo/".urlencode($matricula)."/".urlencode($dni),"GET");
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
    else
    { 
        
        foreach($obj->multas as $fila)
        {
            echo "<article>";
                echo "<p><span class='detalle'>Fecha/Hora: </span><input readonly type='text' value='".$fila->fecha_y_hora."'/> </p>";
                echo "<p><span class='detalle'>DNI: </span><input readonly type='text' value='".$fila->dni_conductor."'/></p>";
                echo "<p><span class='detalle'>Matricula: </span><input readonly type='text' value='".$fila->matricula_vehiculo."'/></p>";
                echo "<p><span class='detalle'>Precio: </span><input readonly type='text' value='".$fila->precio."'/></p>";
                echo "<p><span class='detalle'>Estado: </span><input readonly type='text' value='".$fila->estado."'/></p>";
                echo "<p id='obs'><span class='detalle'>Observaciones: </span><textarea readonly>".$fila->observaciones."</textarea></p>";
                echo "<p id='fotovehiculomulta'><span id='detallevehiculomulta' class='detalle'>Foto: </span><img src='../../img/fotos_multa/".$fila->foto."' /></p>";
                if ($fila->estado=="en tramite" || $fila->estado=="tramitada")
                {
                   
                        echo "<button formaction='multaspendientes.php' class='btnpagar' name='btnpagar'>Pagar</button>";
                 
                }
            echo "</article>";
            
        }
          
    }
}

function tienemulta($matricula,$dni)
{
    $obj=consumir_servicio_REST(ruta."haymulta/".urlencode($matricula)."/".urlencode($dni),"GET");
 
    if(isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
          
      else if(isset($obj->mensaje))
      {
        return false;
      }
          
      else 
      {

        return $obj->hay;
      }
    
        
    
}

?>

