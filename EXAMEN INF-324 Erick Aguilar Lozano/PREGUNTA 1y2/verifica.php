<?php
require "conexion.php";
$conn=conexion();

$usuario=$_POST["user"];
$clave=$_POST["password"];

$SQL2 = "SELECT * FROM usuario us inner join identificador dor on us.ci=dor.ci  Where us.ci='$usuario' AND us.clave ='$clave' ";
$Registro = mysqli_query($conn,$SQL2);
if(mysqli_num_rows($Registro)==1)
{
	//echo "entrooooooooooo";
if($vec = mysqli_fetch_array($Registro))
{ $ci=$vec["ci"];
	$nombre=$vec["nombre"];
	$color=$vec["color"];
}


$id=md5($ci);
iniciar_sesion($id);
Registrar("Id",$id);
Registrar("Nombre",$nombre);
Registrar("CI",$ci);
Registrar("Color",$color);
header("Location:bienvenida.php?id=$id");
}
else
{
	header("Location:index.php?error=si");
}
?>
