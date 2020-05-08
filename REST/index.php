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


$app->post('/login', function () {
    echo json_encode(comprobarUsuario($_POST['usuario'],$_POST['clave']),JSON_FORCE_OBJECT);
});

$app->get('/puntos/:id',function($dni){
    echo json_encode(puntos($dni),JSON_FORCE_OBJECT);
});

$app->run();
?>





