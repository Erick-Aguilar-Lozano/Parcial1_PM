<?php
require "conexion.php";
$conn = conexion();
continuar_sesion($_GET['id'],"Id",$URLERROR);
$nombre=Recuperar("Nombre");
$ci=Recuperar("CI");
$foto="fotos/$ci.jpg";
$color=Recuperar("Color");

if($color=="#0000FF"){$nomcolor="Azul";}
if($color=="#00FFFF"){$nomcolor="Celeste";}
if($color=="#00FF00"){$nomcolor="Verde";}
if($color=="#FFFF00"){$nomcolor="Amarillo";}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $nombre;?></title>
<script src="jquery-1.10.2.js"></script>
<link rel="stylesheet" href="estilos_formulario.css" type="text/css"/>
<script src="codigos.js" type="text/javascript"></script>
</head>
<style>
		#fotoperfil {
  		background-image: <?php  echo "url($foto)"; ?>;
			background-repeat: no-repeat;
			width: 250px;
			height: 250px;
			//border-style: solid;
			//bottom: 300px;
		}
		body{
			background-color: <?php echo $color; ?>;
		}
</style>
<body>
   	<center><div id=fotoperfil> </div></center>
		<h1><?php echo $nombre; ?></h1>
		<h1><a <?php echo "href=cerrar_sesion.php?id=$_GET[id]"; ?> >  Cerrar Sesion </a><h1>
		<center><h3>Usted puede cambiar el color de fondo desde el listado:<h3>
		<select name="color" id="color" onchange='cambiarcolor()'>
			  <?php echo "<option value='$color'>$nomcolor</option>"; ?>
  			<option value="#0000FF">Azul</option>
  			<option value="#00FFFF">Celeste</option>
  			<option value="#00FF00">Verde</option>
  			<option value="#FFFF00">Amarillo</option>
		</select></center>
<h2>-------------------PREGUNTA 2-------------------</h2>
<section>
<?php
	echo "<table border=1>
				<tr>
				<th> Cantidad</th>
				<th> Departamento</th>
				</tr>";
$sql='SELECT ide.lugar_resi as departamento,COUNT(CASE WHEN nt.nota >= 51 then "APROBADO" ELSE NULL END) as "CANTIDAD"
FROM identificador ide inner join notas nt on ide.ci = nt.ci GROUP BY departamento';
$resu=mysqli_query($conn,$sql);
while($vec = mysqli_fetch_array($resu))
{
		echo "<tr>";
		echo "<td>".$vec['CANTIDAD']." </td> ";
		echo "<td> ".$vec['departamento']."</td>";
		echo "</tr>";
}
echo "</table>";
 ?>
</section>
</body>
</html>
