<?php
define("ruta","http://localhost/gestDGT/REST/");
define('MINUTOS',1);

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
    //$decodeText = substr($response, 3, strlen($response) - 1);
    return json_decode($response);
}

  function obtener_usuario($dni,$clave)
{
  
    $datosPost=['dni'=>$dni,'clave'=>$clave];
   
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
        $datos["id_tipo_carne"]=$obj->usuario->id_tipo_carne;

        var_dump($datos);
        return $datos; 
    }
  }

  



  
?>

