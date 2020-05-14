<?php

if($intruso)
{
    if(isset($_POST["btnentrar"]) && $_POST["usuario"]!="" && $_POST["clave"]!=""){

        if(isset($_POST["usuario"]) && isset($_POST["clave"]))
        {
                if($datos_usu_log=obtener_usuario($_POST["usuario"],MD5($_POST["clave"])))
                {
                    $_SESSION["usuario"]=$_POST["usuario"];
                    $_SESSION["clave"]=MD5($_POST["clave"]);
                    $_SESSION["ultimo_acceso"]=time();
                    header("Location: index.php");
                    exit;
                }
                else
                { 
                    $_SESSION['errorusuario']="";
                    header("Location: index.php");
                    exit;
                }
        }
        else
        {
            header("Location: index.php");
            exit;
        }     
    }

    else
    {

    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <meta name="author" content="Rafael Carrillo Bonilla">
	  <meta name="description" content="GestDGT+">
	  <meta name="lang" content="es-ES" />
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel='stylesheet' type="text/css" href='css/estilosiniciosesion.css'>
    <link rel="icon" type="image/png" href="img/logotipo3png.png">
    <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4a9d5317b6.js" crossorigin="anonymous"></script>
    <script src='js/jquery-3.1.1.js'></script>
    <script src='js/scriptiniciosesion.js'></script>
    <title>GestDGT+</title>
</head>

<body class="centro">

  <main class="login centro">
  <?php
                if(isset($_SESSION['restringido']))
                 echo "<p class='errorsesion'>Estás tratando de acceder a una zona restringida.</p>";
                if(isset($_SESSION['tiempo']))
                 echo "<p class='errorsesion'>Ha expirado la sesión. Por favor, vuelva a identificarse.</p>";
                if(isset($_SESSION['errorusuario']))
                 echo "<p class='errorsesion'>El usuario y/o contraseña no son válidos.</p>";

                 session_unset();
  ?>
    <p>
      <img class="logo" src='img/logotipo3png.png'/>
    </p>
 
    <form class="login-form centro" method='post' action='index.php'>
      <p id="test" class="usuario">
        <label for="usuariop" class="labelusuclave centro">
          <i class="fas fa-user"></i>
        </label>
        <input id="usuariop" placeholder="Usuario"  type="text" name="usuario" value='<?php if(isset($_POST['usuario'])) echo $_POST['usuario'];?>'>
        <?php if(isset($_POST['btnentrar'])&&$_POST['usuario']=="") echo "<p class='errorvacio'>Rellene el campo</p>";?>
      </p>

      <p class="clave">
        <label for="clavep" class="labelusuclave centro">
          <i class="fas fa-lock"></i>
        </label>
        <input id="clavep" placeholder="Clave" type="password" name="clave" value=''>
        <?php if(isset($_POST['btnentrar'])&&$_POST['clave']=="") echo "<p class='errorvacio'>Rellene el campo</p>";?>
      </p>
      <button type='submit' id="btnentrar" class="centro" name="btnentrar">
        Acceder
      </button>
    </form>

    
</main> 

</body> 
</html>
    <?php
    }
}
else
{
    session_name("gestdgt+");
    session_start();
    session_unset();
    $_SESSION["restringida"]="";
    header("Location:../index.php");
    exit;
}



?>


