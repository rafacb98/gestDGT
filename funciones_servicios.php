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
        echo "<p>Nombre:<span class='datos'> ".$obj->dni->nombre."</span></p>";
        echo "<p>Apellidos:<span class='datos'> ".$obj->dni->apellidos."</span></p>";
        echo "<p>DNI:<span class='datos'> ".$obj->dni->dni."</span></p>";
        echo "<p>Dirección:<span class='datos'> ".$obj->dni->direccion."</span></p>";
        echo "<p>Teléfono:<span class='datos'> ".$obj->dni->telefono."</span></p>";
        echo "<p>Nº de carné:<span class='datos'> ".$obj->dni->n_carne."</span></p>";
        echo "<p class='espe'>Año expedición de carné:<span class='datos'> ".$obj->dni->anio_exp_carne."</span></p>";
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
            echo "<span class='datos'> | ".$fila->descripcion." | </span>";
        
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
                echo "<p><span class='detalle'>Matricula: </span>".$fila->matricula." </p>";
                echo "<p><span class='detalle'>Bastidor: </span>".$fila->bastidor. "</p>";
                echo "<p><span class='detalle'>Marca: </span>".$fila->marca. "</p>";
                echo "<p><span class='detalle'>Modelo: </span>".$fila->modelo. "</p>";
                echo "<p><span class='detalle'>Año: </span>".$fila->anio. "</p>";
                echo "<p><span class='detalle'>Tipo: </span>".$fila->tipo. "</p>";
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
            echo "<td><img src='../../img/".$fila->foto."' /></td>"; 
            echo "<td><form action='' method='post'><button class='btnnueva' name='btneditar'><i class='fas fa-user-edit'></i></button></form></td>"; 
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




  
?>

