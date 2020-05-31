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

$app->get('/nplaca/:id',function($dni){
    echo json_encode(nplaca($dni),JSON_FORCE_OBJECT);
});

$app->get('/perfil/:id',function($id){
    echo json_encode(perfil($id),JSON_FORCE_OBJECT);
});

$app->get('/carnes/:id',function($id){
    echo json_encode(carnes($id),JSON_FORCE_OBJECT);
});

$app->get('/totalvehiculos/:id',function($id){
    echo json_encode(totalvehiculos($id),JSON_FORCE_OBJECT);
});

$app->get('/vehiculosusu/:id',function($id){
    echo json_encode(vehiculosusu($id),JSON_FORCE_OBJECT);
});

$app->get('/multas', function ()  {
    echo json_encode(multas(),JSON_FORCE_OBJECT);
});


$app->post('/nuevamultasinfoto', function () {
    echo json_encode(nuevamultasinfoto($_POST['fechahora'],$_POST['precio'],$_POST['estado'],$_POST['obs'],$_POST['dniconductor'],$_POST['matricula']),JSON_FORCE_OBJECT);
});

$app->post('/nuevamultaconfoto', function () {
    echo json_encode(nuevamultaconfoto($_POST['fechahora'],$_POST['precio'],$_POST['estado'],$_POST['obs'],$_POST['foto'],$_POST['dniconductor'],$_POST['matricula']),JSON_FORCE_OBJECT);
});

$app->get('/infomulta/:fechahora/:dni/:matricula',function($fechahora,$dni,$matricula){
    echo json_encode(infomulta($fechahora,$dni,$matricula),JSON_FORCE_OBJECT);
});


$app->put('/actualizartramitada/:fechahora/:dni/:matricula',function ($fechahora,$dni,$matricula) use ($app){
    $datosMulta=$app->request->put();
    echo json_encode(actualizartramitada($fechahora,$dni,$matricula,$datosMulta['estado']),JSON_FORCE_OBJECT);
});

$app->put('/actualizarpagada/:fechahora/:dni/:matricula',function ($fechahora,$dni,$matricula) use ($app){
    $datosMulta=$app->request->put();
    echo json_encode(actualizarpagada($fechahora,$dni,$matricula,$datosMulta['estado']),JSON_FORCE_OBJECT);
});

$app->put('/actualizarfinalizada/:fechahora/:dni/:matricula',function ($fechahora,$dni,$matricula) use ($app){
    $datosMulta=$app->request->put();
    echo json_encode(actualizarfinalizada($fechahora,$dni,$matricula,$datosMulta['estado']),JSON_FORCE_OBJECT);
});



$app->put('/actualizarclave/:dni',function ($dni) use ($app){
    $datosClave=$app->request->put();
    echo json_encode(actualizarclave($dni,$datosClave['clavenueva']),JSON_FORCE_OBJECT);
});

$app->get('/multavehiculo/:matricula/:dni',function($matricula,$dni){
    echo json_encode(multavehiculo($matricula,$dni),JSON_FORCE_OBJECT);
});

$app->get('/haymulta/:matricula/:dni',function($matricula,$dni){
    echo json_encode(haymulta($matricula,$dni),JSON_FORCE_OBJECT);
});

$app->get('/vehiculomultado/:matricula', function ($matricula)  {
    echo json_encode(vehiculomultado($matricula),JSON_FORCE_OBJECT);
});

$app->get('/conductormultado/:matricula', function ($matricula)  {
    echo json_encode(conductormultado($matricula),JSON_FORCE_OBJECT);
});

$app->put('/actualizarestadomulta/:fechahora/:dni/:matricula',function ($fechahora,$dni,$matricula) use ($app){
    $datosEstado=$app->request->put();
    echo json_encode(actualizarestadomulta($fechahora,$dni,$matricula,$datosEstado['estadoeditar']),JSON_FORCE_OBJECT);
});

$app->run();
?>





