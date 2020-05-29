<?php
require "conexionbd.php";

function comprobarUsuario($dni, $clave)
{
    $con = conectar();

    if (!$con) {
        return array("mensaje_error" => "Imposible conectar. Error " . mysqli_connect_errno());
    } else {
        mysqli_set_charset($con, "utf8");
        $consulta = "select * from usuario where dni='" . $dni . "' and clave='" . $clave . "'";

        $resultado = mysqli_query($con, $consulta);

        if ($fila = mysqli_fetch_assoc($resultado)) {
            mysqli_close($con);
            return array("usuario" => $fila);
        } else {
            mysqli_close($con);
            return array("mensaje" => false);
        }
    }
}

function puntos($dni)
{
    $con=conectar();

    if (!$con)
    {
    return array("mensaje_error"=>"Imposible conectar. Error ".mysqli_connect_errno());
    }
    else
    {
        mysqli_set_charset($con,"utf8");
        $consulta="select puntos from usuario where dni='".$dni."'";
        $resultado=mysqli_query($con,$consulta);

        if(!$resultado)
        {
            $mensaje="Imposisble realizar la consulta. Error ".mysqli_errno($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
        else
        {
            if(mysqli_num_rows($resultado)>0)
            {
                $fila=mysqli_fetch_assoc($resultado);
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("dni"=>$fila);

            }
            else
            {
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("mensaje"=>"No existe el usuario con ".$id);
            }
        }
    }
}

function nplaca($dni)
{
    $con=conectar();

    if (!$con)
    {
    return array("mensaje_error"=>"Imposible conectar. Error ".mysqli_connect_errno());
    }
    else
    {
        mysqli_set_charset($con,"utf8");
        $consulta="select n_placa from usuario where dni='".$dni."'";
        $resultado=mysqli_query($con,$consulta);

        if(!$resultado)
        {
            $mensaje="Imposisble realizar la consulta. Error ".mysqli_errno($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
        else
        {
            if(mysqli_num_rows($resultado)>0)
            {
                $fila=mysqli_fetch_assoc($resultado);
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("dni"=>$fila);

            }
            else
            {
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("mensaje"=>"No existe el usuario con ".$id);
            }
        }
    }
}

function perfil($dni)
{
    $con=conectar();

    if (!$con)
    {
    return array("mensaje_error"=>"Imposible conectar. Error ".mysqli_connect_errno());
    }
    else
    {
        mysqli_set_charset($con,"utf8");
        $consulta="select * from usuario where usuario.dni='".$dni."'";
        $resultado=mysqli_query($con,$consulta);

        if(!$resultado)
        {
            $mensaje="Imposisble realizar la consulta. Error ".mysqli_errno($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
        else
        {
            if(mysqli_num_rows($resultado)>0)
            {
                $fila=mysqli_fetch_assoc($resultado);
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("dni"=>$fila);

            }
            else
            {
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("mensaje"=>"No existe el usuario con ".$id);
            }
        }
    }
}

function carnes($dni)
{
    $con=conectar();

    if (!$con)
    {
    return array("mensaje_error"=>"Imposible conectar. Error ".mysqli_connect_errno());
    }
    else
    {
        mysqli_set_charset($con,"utf8");
        $consulta="select descripcion from usuario join detalle_tipo_carne on detalle_tipo_carne.dni_conductor=usuario.dni join tipo_carne on detalle_tipo_carne.id_tipo_carne=tipo_carne.id  where usuario.dni='".$dni."'";
        $resultado=mysqli_query($con,$consulta);

        if(!$resultado)
        {
            $mensaje="Imposisble realizar la consulta. Error ".mysqli_errno($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
        else
        {
            $dni=Array();
            while ($fila=mysqli_fetch_assoc($resultado))
            {
                $dni[]=$fila;
            }

            mysqli_free_result($resultado);
            mysqli_close($con);
            return array("dni"=>$dni);
        }
    }
}

function totalvehiculos($dni)
{
    $con=conectar();

    if (!$con)
    {
    return array("mensaje_error"=>"Imposible conectar. Error ".mysqli_connect_errno());
    }
    else
    {
        mysqli_set_charset($con,"utf8");
        $consulta="select count(*) as total from vehiculo where dni_conductor='".$dni."'";
        $resultado=mysqli_query($con,$consulta);

        if(!$resultado)
        {
            $mensaje="Imposisble realizar la consulta. Error ".mysqli_errno($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
        else
        {
            if(mysqli_num_rows($resultado)>0)
            {
                $fila=mysqli_fetch_assoc($resultado);
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("dni"=>$fila);

            }
            else
            {
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("mensaje"=>"No existe el usuario con ".$id);
            }
        }
    }
}


function vehiculosusu($dni)
{
    $con=conectar();

    if (!$con)
    {
    return array("mensaje_error"=>"Imposible conectar. Error ".mysqli_connect_errno());
    }
    else
    {
        mysqli_set_charset($con,"utf8");
        $consulta="select * from vehiculo where dni_conductor='".$dni."'";
        $resultado=mysqli_query($con,$consulta);

        if(!$resultado)
        {
            $mensaje="Imposisble realizar la consulta. Error ".mysqli_errno($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
        else
        {
            $vehiculos=Array();
            while ($fila=mysqli_fetch_assoc($resultado))
            {
                $vehiculos[]=$fila;
            }

            mysqli_free_result($resultado);
            mysqli_close($con);
            return array("vehiculos"=>$vehiculos);
        }
    }
}

function multas()
{
    $con=conectar();

    if (!$con)
    {
        return array("mensaje_error"=>"Imposible conectar. Error ".mysqli_connect_errno());
    }
    else
    {
        mysqli_set_charset($con,"utf8");
        $consulta="select * from multa";
        $resultado=mysqli_query($con,$consulta);

        if(!$resultado)
        {
            $mensaje="Imposisble realizar la consulta. Error ".mysqli_errno($con);
            mysqli_close($con);
            return array("mensaje_error"=>$consulta);
        }
        else
        {
            $multas=Array();
            while ($fila=mysqli_fetch_assoc($resultado))
            {
                $multas[]=$fila;
            }

            mysqli_free_result($resultado);
            mysqli_close($con);
            return array("multas"=>$multas);
        }
    }
}

function nuevamultasinfoto($fechayhora,$precio,$estado,$observaciones,$dniconductor,$matriculavehiculo)
{
    $con=conectar();

    if(!$con)
    {
        return array("mensaje_error"=>"Imposible conectar. Error ".mysqli_connect_errno());
    }
    else
    {
        mysqli_set_charset($con,"utf8");
        $consulta="insert into multa (fecha_y_hora,precio,estado,observaciones,dni_conductor,matricula_vehiculo) values ('".$fechayhora."','".$precio."','".$estado."','".$observaciones."','".$dniconductor."','".$matriculavehiculo."')";

        $resultado=mysqli_query($con,$consulta);

        if(!$resultado)
        {
            $mensaje="Imposible realizar la consulta. Error ".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
        else
        {
            mysqli_close($con);
            return array("mensaje"=>"Se ha insertado ".$fechayhora. " correctamente");
        }
    }

}

function nuevamultaconfoto($fechayhora,$precio,$estado,$observaciones,$foto,$dniconductor,$matriculavehiculo)
{
    $con=conectar();

    if(!$con)
    {
        return array("mensaje_error"=>"Imposible conectar. Error ".mysqli_connect_errno());
    }
    else
    {
        mysqli_set_charset($con,"utf8");
        $consulta="insert into multa (fecha_y_hora,precio,estado,observaciones,foto,dni_conductor,matricula_vehiculo) values ('".$fechayhora."','".$precio."','".$estado."','".$observaciones."','".$foto."','".$dniconductor."','".$matriculavehiculo."')";
 
        $resultado=mysqli_query($con,$consulta);
     
        if(!$resultado)
        {
            $mensaje="Imposible realizar la consulta. Error ".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
        else
        {
            mysqli_close($con);

            
            
            return array("mensaje"=>"Se ha insertado ".$fechayhora. " correctamente");
        }
    }

}

function infomulta($fechahora,$dni,$matricula)
	{
		$con = conectar();

    if (!$con) {
        return array("mensaje_error" => "Imposible conectar. Error " . mysqli_connect_errno());
    } else {
        mysqli_set_charset($con, "utf8");
        $consulta = "select * from multa where fecha_y_hora='" . $fechahora . "' and dni_conductor='" . $dni . "' and matricula_vehiculo='".$matricula."'";

        $resultado = mysqli_query($con, $consulta);

        if ($fila = mysqli_fetch_assoc($resultado)) {
            mysqli_close($con);
            return array("multa" => $fila);
        } else {
            mysqli_close($con);
            return array("mensaje" => false);
        }
    }
	}

    

    function actualizartramitada ($fechahora,$dni,$matricula,$estado)
    {
        $con=conectar();
        if (!$con)
        {
            return array("mensaje_error"=>"Imposible conectar. Error ".mysqli_connect_errno());
        }
        else
        {
            mysqli_set_charset($con,"utf8");
            $consulta="update multa set estado='".$estado."' where fecha_y_hora='" . $fechahora . "' and dni_conductor='" . $dni . "' and matricula_vehiculo='".$matricula."'";
            $resultado=mysqli_query($con,$consulta);
            
            if(!$resultado)
            {
                $mensaje="Imposisble realizar la consulta. Error ".mysqli_errno($con);
                mysqli_close($con);
                return array("mensaje_error"=>$mensaje);
            }
            
            else
            {
                mysqli_close($con);
                return array("actualizado"=>"Se ha actualizado");
            }
        }
    }

    function actualizarpagada ($fechahora,$dni,$matricula,$estado)
    {
        $con=conectar();
        if (!$con)
        {
            return array("mensaje_error"=>"Imposible conectar. Error ".mysqli_connect_errno());
        }
        else
        {
            mysqli_set_charset($con,"utf8");
            $consulta="update multa set estado='".$estado."' where fecha_y_hora='" . $fechahora . "' and dni_conductor='" . $dni . "' and matricula_vehiculo='".$matricula."'";
            $resultado=mysqli_query($con,$consulta);
            
            if(!$resultado)
            {
                $mensaje="Imposisble realizar la consulta. Error ".mysqli_errno($con);
                mysqli_close($con);
                return array("mensaje_error"=>$mensaje);
            }
            
            else
            {
                mysqli_close($con);
                return array("actualizado"=>"Se ha actualizado");
            }
        }
    }

    function actualizarfinalizada ($fechahora,$dni,$matricula,$estado)
    {
        $con=conectar();
        if (!$con)
        {
            return array("mensaje_error"=>"Imposible conectar. Error ".mysqli_connect_errno());
        }
        else
        {
            mysqli_set_charset($con,"utf8");
            $consulta="update multa set estado='".$estado."' where fecha_y_hora='" . $fechahora . "' and dni_conductor='" . $dni . "' and matricula_vehiculo='".$matricula."'";
            $resultado=mysqli_query($con,$consulta);
            
            if(!$resultado)
            {
                $mensaje="Imposisble realizar la consulta. Error ".mysqli_errno($con);
                mysqli_close($con);
                return array("mensaje_error"=>$mensaje);
            }
            
            else
            {
                mysqli_close($con);
                return array("actualizado"=>"Se ha actualizado");
            }
        }
    }



   function actualizarclave ($dni,$clave)
   {
       $con=conectar();
       if (!$con)
       {
           return array("mensaje_error"=>"Imposible conectar. Error ".mysqli_connect_errno());
       }
       else
       {
           mysqli_set_charset($con,"utf8");
           $consulta="update usuario set clave='".md5($clave)."' where dni='" . $dni . "'";
           $resultado=mysqli_query($con,$consulta);
           
           if(!$resultado)
           {
               $mensaje="Imposisble realizar la consulta. Error ".mysqli_errno($con);
               mysqli_close($con);
               return array("mensaje_error"=>$mensaje);
           }
           
           else
           {
               mysqli_close($con);
               return array("actualizado"=>"Se ha actualizado");
           }
       }
   }
   
   function multavehiculo($matricula,$dni)
	{
        $con=conectar();

        if (!$con)
        {
            return array("mensaje_error"=>"Imposible conectar. Error ".mysqli_connect_errno());
        }
        else
        {
            mysqli_set_charset($con,"utf8");
            $consulta = "select * from multa where dni_conductor='" . $dni . "' and matricula_vehiculo='".$matricula."'";
            $resultado=mysqli_query($con,$consulta);
    
            if(!$resultado)
            {
                $mensaje="Imposisble realizar la consulta. Error ".mysqli_errno($con);
                mysqli_close($con);
                return array("mensaje_error"=>$consulta);
            }
            else
            {
                $multas=Array();
                while ($fila=mysqli_fetch_assoc($resultado))
                {
                    $multas[]=$fila;
                }
    
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("multas"=>$multas);
            }
        }
    }
    
    function haymulta($matricula,$dni)
	{
		$con = conectar();

    if (!$con) {
        return array("mensaje_error" => "Imposible conectar. Error " . mysqli_connect_errno());
    } else {
        mysqli_set_charset($con, "utf8");
        $consulta = "select * from multa where dni_conductor='" . $dni . "' and matricula_vehiculo='".$matricula."'";
        $resultado = mysqli_query($con, $consulta);

        if ($fila = mysqli_fetch_assoc($resultado)) {
            mysqli_close($con);
            return array("hay" => $fila);
        } else {
            mysqli_close($con);
            return array("mensaje" => false);
        }
    }
	}
   
?>