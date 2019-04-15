<?php
require 'seguridad.php';

# cargamos el archivo de configuracion
require 'config.php';

$id = $_GET['id'];
$file = File::find($id);
$archivo = $file->link;
	

if(unlink($archivo)){
	$file->delete();
}

header("location:file_list.php");