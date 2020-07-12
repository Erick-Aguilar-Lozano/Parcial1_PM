<?php
require "conexion.php";
$conn = conexion();
continuar_sesion($_GET['id'],"Id",$URLERROR);
session_destroy();
header("Location:index.php");
 ?>
