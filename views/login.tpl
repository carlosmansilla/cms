<!DOCTYPE html>
<html lang="es">
<head>
<title>Repositorio</title>
<link rel="stylesheet" type="text/css" href="css/login.css" />
</head>
<body>
<div id="login">
    <h2 id="titulo">REPOSITORIO</h2>
    <form method='post' action='index.php'>
	usuario: <input type='text' name='nick'/>
	clave: <input type='password' name='pass'/>
	<input type='submit' value='Login'/>
    <spam id="mensaje">{$mensaje}</spam>
    </form>
</div>