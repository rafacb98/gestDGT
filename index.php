<?php

session_name('gestdgt+');
session_start();

//require "REST/funciones.php";
require "funciones_servicios.php";

if(isset($_SESSION["usuario"]) && isset($_SESSION["clave"]) && isset($_SESSION["ultimo_acceso"]))
{	
	
	if($datos_usu_log=obtener_usuario($_SESSION["usuario"],$_SESSION["clave"])){
        
       
		$tiempo_trans=time()-$_SESSION["ultimo_acceso"];
		if($tiempo_trans>60*MINUTOS)
		{
			session_unset();
			$_SESSION["tiempo"]="";
			header("Location:index.php");
			exit;
		}
		else
		{
			$_SESSION['ultimo_acceso']=time();
			$logueado=true;
			
            if($datos_usu_log["tipo"]=="conductor")
            {
                include "vistas/conductor/inicio.php";
            }
            else
            {
                include "vistas/agente/inicio.php";
            }
			
		}
	}
	else{
		session_unset();
		$_SESSION["restringida"]="";
		header("Location:index.php");
		exit;
	}
}
else
{
	$intruso=true;
	include "vistas/index.php";
}
