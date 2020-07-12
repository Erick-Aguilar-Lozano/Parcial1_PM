<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulario API</title>
<link rel="stylesheet" href="estilos_formulario.css" type="text/css"/>
<script src="codigos.js" type="text/javascript"></script>
<style>
body{
	background:#1b1e24;
	background-image:linear-gradient(to left,#1b1e24,#1b1e24 50%,#1b1e24);
	text-align:center;
	font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-size:14px;
	line-height:1.5em;
}
</style>
</head>

<body>
<h1>LOGIN</h1>
<section>
	<form method="POST" action="verifica.php">
    <span class="fontawesome-user"></span><input type="text" placeholder="Nombre de usuario" name="user" id="user" autocomplete="off" required />
    <span class="fontawesome-lock"></span><input type="password" placeholder="Contraseña" name="password" id="password" autocomplete="off" required/>
    <input type="submit" value="Ingresar" id="enviar" />
    </form>
</section>
</body>
</html>
