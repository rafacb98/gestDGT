<?php
define("ruta","http://localhost/gestDGT/REST/");
define('MINUTOS',2);

function consumir_servicio_REST($url,$metodo,$datos=null){
    $llamada = curl_init($url);
    //a true, obtendremos una respuesta de la url, en otro caso,
    //true si es correcto, false si no lo es
    curl_setopt($llamada, CURLOPT_RETURNTRANSFER, true);
    //establecemos el verbo http que queremos utilizar para la petición
    curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, $metodo);
    //obtenemos la respuesta

    if(isset($datos)){
      curl_setopt($llamada, CURLOPT_POSTFIELDS, http_build_query($datos));

    }
    $response = curl_exec($llamada);
    // Se cierra el recurso CURL y se liberan los recursos del sistema
    curl_close($llamada);
    if(!$response) {
      die('Error al consumir el servicio Web: '.$url);
    }else{
     $decodedText= substr($response,3,strlen($response)-1);
     return  json_decode($decodedText);
    }

  }


