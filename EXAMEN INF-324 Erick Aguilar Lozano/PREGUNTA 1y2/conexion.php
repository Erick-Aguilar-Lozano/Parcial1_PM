<?php
function conexion()
{
$host="localhost";
$user="root";
$pass="";
$bd="examen_academico";
$conn=mysqli_connect($host,$user,$pass,$bd) or die ("error conectando");
return($conn);
}

$URLERROR="index.php?error=si";
//$Duracion=30;
function Registrar($Variable,$Valor)
{  //$_SESSION[$Variable]=base64_encode($Valor);
  $_SESSION[$Variable]=$Valor;
};
function Recuperar($Variable)
{ //return base64_decode($_SESSION[$Variable]);
  return $_SESSION[$Variable];
};
function iniciar_sesion($Id_Sesion)
  { session_id($Id_Sesion);
    @session_start();
    $_SESSION['Hora_Inicio']=time();
  };
function continuar_sesion($Id_Sesion,$Variable,$EnERROR)
{  if(!isset($Id_Sesion))
         { //echo "";
         header("Location:"."$EnERROR");         exit();
         };
        $hora_actual=time();
    session_id($Id_Sesion);
    @session_start();
    if (isset($_SESSION[$Variable]))
     { $Permanencia =$hora_actual-$_SESSION['Hora_Inicio'];
     if(($Permanencia/60) > 40) // antes estaba 20
     //  if ($Permanencia>3)
        {          session_destroy();
           header("Location:".$EnERROR);          exit();
        };
     }
    else
     {     session_destroy();      header("Location:".$EnERROR);      exit();
     };
  $_SESSION['Hora_Inicio']=time();
  };
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
?>
