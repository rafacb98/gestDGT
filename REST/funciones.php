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



?>