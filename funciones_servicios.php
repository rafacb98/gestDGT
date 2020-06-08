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
        echo $obj->dni->puntos;        
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
        echo "<p><label for='nombre'>Nombre:<span class='datos'><input id='nombre' name='nombre' type='text' readonly value='".$obj->dni->nombre."'/></span></p>";
        echo "<p><label for='apellidos'>Apellidos:<span class='datos'><input id='apellidos' name='apellidos' readonly type='text' value='".$obj->dni->apellidos."'/></span></p>";
        echo "<p><label for='dni'>DNI:<span class='datos'><input id='dni' name='dni' readonly type='text' value='".$obj->dni->dni."'/></span></p>";
        echo "<p><label for='direccion'>Dirección:<span class='datos'><input id='direccion' name='direccion' type='text' readonly value='".$obj->dni->direccion."'/></span></p>";
        echo "<p><label for='telefono'>Teléfono:<span class='datos'><input id='telefono' name='telefono' type='text' readonly value='".$obj->dni->telefono."'/></span></p>";
        echo "<p><label for='ncarne'>Número de carné:<span class='datos'><input id='ncarne' name='ncarne' type='text' readonly value='".$obj->dni->n_carne."'/></span></p>";
        echo "<p class='espe'><label for='anioexp'>Año expedición de carné:<span class='datos'><input id='anioexp' name='anioexp' type='text' readonly value='".$obj->dni->anio_exp_carne."'/></span></p>";
       
        
           
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
        echo "<p><label for='nombre'>Nombre:</label><span class='datos'><input id='nombre' name='nombre' type='text' readonly value='".$obj->dni->nombre."'/></span></p>";
        echo "<p><label for='apellidos'>Apellidos:<span class='datos'><input id='apellidos' name='apellidos' readonly type='text' value='".$obj->dni->apellidos."'/></span></p>";
        echo "<p><label for='nplaca'>Número de placa:<span class='datos'><input id='nplaca' name='nplaca' readonly type='text' value='".$obj->dni->n_placa."'/></span></p>";
        echo "<p><label for='dni'>DNI:<span class='datos'><input id='dni' readonly name='dni' type='text' value='".$obj->dni->dni."'/></span></p>";
        echo "<p><label for='direccion'>Dirección:<span class='datos'><input id='direccion' name='direccion' type='text' readonly value='".$obj->dni->direccion."'/></span></p>";
        echo "<p><label for='telefono'>Teléfono:<span class='datos'><input id='telefono' name='telefono' type='text' readonly value='".$obj->dni->telefono."'/></span></p>";
        
           
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
            
                echo "<span class='datos'><input name='tipocarne' class='tipocar' readonly type='text' value='".$fila->descripcion."'/></span>";
          
        
        }
        echo "<form class='formnuevocarne' action='nuevocarne.php' method='post'><button id='aniadircarne'><i class='fas fa-plus'></i>&nbsp;&nbsp;&nbsp;Añadir carné</button></form></p>";  
        echo "<form class='editarclave' action='editarclave.php' method='post'>";
      
       echo "<button>Cambiar contraseña&nbsp;&nbsp;&nbsp;<i class='fas fa-lock'></i></button>";
      
      echo "</form>";   
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

function actualizarclaveperfil2($dni,$clave)
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
        header("Location: ../agente/perfil.php");
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
            echo "<p><label for='fechahora'><span class='detalle'>Fecha/Hora: </span></label><input id='fechahora' name='fechahora' readonly type='text' value='".$fila->fecha_y_hora."'/> </p>";
            echo "<p><span class='detalle'><label for='dni'>DNI:</label> </span><input id='dni' name='dni' readonly type='text' value='".$fila->dni_conductor."'/></p>";
            echo "<p><span class='detalle'><label for='matricula'>Matricula:</label> </span><input id='matricula' name='matricula' readonly type='text' value='".$fila->matricula_vehiculo."'/></p>";
            echo "<p><span class='detalle'><label for='precio'>Precio:</label> </span><input id='precio' name='precio' readonly type='text' value='".$fila->precio."'/></p>";
            echo "<p><span class='detalle'><label for='estado'>Estado:</label> </span><input id='estado' name='estado' readonly type='text' value='".$fila->estado."'/></p>";
            echo "<p id='obs'><span class='detalle'><label for='obse'>Observaciones:</label> </span><textarea id='obse' name='obse' readonly>".$fila->observaciones."</textarea></p>";
            echo "<p id='fotovehiculomulta'><span id='detallevehiculomulta' class='detalle'><label for='foto'>Foto:</label> </span><img id='foto' alt='foto' src='../../img/fotos_multa/".$fila->foto."' /></p>";
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

function infovehiculomultado($matricula)
{
    $obj=consumir_servicio_REST(ruta."vehiculomultado/".urlencode($matricula),"GET");
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
    else
    { 
        echo "<p>Matricula:<input type='text' readonly value='".$obj->vehiculomultado->matricula."'/></p>";
        echo "<p>Bastidor:<input readonly type='text' value='".$obj->vehiculomultado->bastidor."'/></p>";
        echo "<p>Marca:<input readonly type='text' value='".$obj->vehiculomultado->marca."'/></p>";
        echo "<p>Modelo:<input type='text' readonly value='".$obj->vehiculomultado->modelo."'/></p>";
        echo "<p>Año:<input type='text' readonly value='".$obj->vehiculomultado->anio."'/></p>";
        echo "<p>Tipo:<input type='text' readonly value='".$obj->vehiculomultado->tipo."'/></p>";
        
        
           
    }
}

function infoconductormultado($dni)
{
    $obj=consumir_servicio_REST(ruta."conductormultado/".urlencode($dni),"GET");
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
    else
    { 
        echo "<p>DNI:<input type='text' readonly value='".$obj->conductormultado->dni."'/></p>";
        echo "<p>Nombre:<input readonly type='text' value='".$obj->conductormultado->nombre."'/></p>";
        echo "<p>Apellidos:<input readonly type='text' value='".$obj->conductormultado->apellidos."'/></p>";
        echo "<p>Direccion:<input type='text' readonly value='".$obj->conductormultado->direccion."'/></p>";
        echo "<p>Teléfono:<input type='text' readonly value='".$obj->conductormultado->telefono."'/></p>";
        echo "<p>Año expedicion carné:<input type='text' readonly value='".$obj->conductormultado->anio_exp_carne."'/></p>";
        echo "<p>Número de carné:<input type='text' readonly value='".$obj->conductormultado->n_carne."'/></p>";
        
        
           
    }
}

function modificarestadomulta($fechahora,$dni,$matricula,$estado)
{
    $datosEstado['estadoeditar']=$estado;
        

    $obj=consumir_servicio_REST(ruta."actualizarestadomulta/".urlencode($fechahora)."/".urlencode($dni)."/".urlencode($matricula),"PUT",$datosEstado);
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

function vertiposcarne(){
    $obj=consumir_servicio_REST(ruta."nuevotipocarne","GET");
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }
    else
    { 
        

        foreach($obj->tipocarne as $fila)
        {
            
            echo "<option value='".$fila->id."'>".$fila->descripcion."</option>";
           
        }     
          
          
    }
}


function insertarnuevocarne($dni,$id_tipo_carne){
    $datosCarne['dni']=$dni;
    $datosCarne['nuevotipocarne']=$id_tipo_carne;
   

    $obj=consumir_servicio_REST(ruta."insertarnuevotipocarne","POST",$datosCarne);
    
    if (isset($obj->mensaje_error))
    {
        die($obj->mensaje_error);
    }

    else
    {
        $_SESSION['mensajito']="insertado";
        header("Location: ../conductor/perfil.php");
        exit;
    }


}

?>

