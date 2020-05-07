<?php
require 'Slim/Slim.php';
require 'funciones.php';

// El framework Slim tiene definido un namespace llamado Slim
// Por eso aparece \Slim\ antes del nombre de la clase.
\Slim\Slim::registerAutoloader();
// Creamos la aplicacion
$app = new \Slim\Slim();
// Indicamos el tipo de contenido y condificacion que devolveremos desde el framework Slim
$app->contentType('application/json; charset=utf-8');




$app->run();
?>





