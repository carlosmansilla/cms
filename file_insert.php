<?php
require 'seguridad.php';

# cargamos el archivo de configuracion
require 'config.php';

# buscar proximo numero id
function next_id(){	
	$file = File::last();
	$numero = $file->id+1;
	return $numero;
}

$id = "";
$title = "";
$body = "";
$link = "";
$section_id = "";

if(isset($_GET['id'])){

	$id = $_GET['id'];
	$File = File::find($id);
	$title = $File->title;
	$body = $File->body;
	$link = $File->link;
	$section_id = $File->section_id;
}
elseif(isset($_GET['sec'])){
	$section_id = $_GET['sec'];
}
elseif(isset($_POST['submit'])){

	$id = $_POST['id'];
	$title = $_POST['title'];
	$body = $_POST['body'];
	$section_id = $_POST['seccion'];

	# datos del archivo
	$nombre_archivo = $_FILES['file']['name'];
	$next_id = next_id();
    $nombre_file = ($id<>"")? $id : $next_id;	
	$tipo_archivo = $_FILES['file']['type'];
	$tamano_archivo = $_FILES['file']['size'];
	$extension = explode(".",$nombre_archivo);
	$datos_archivo = pathinfo($nombre_archivo);
	$link = "";

	$num = count($extension)-1;
	if(($tamano_archivo>0)&&($extension[$num]!="php")&&($extension[$num]!="html")){
		$link = "uploads/".$nombre_file.".".$datos_archivo['extension']; 

		if(copy($_FILES['file']['tmp_name'], $link)){
			# nuevo file
			if($id == ""){
				$file = File::create(array(
						'id' => $next_id,
						'title'=> $title,
						'body'=> $body,
						'link'=> $link,
						'section_id'=> $section_id
						));
				$file->save();
			}
			# edita file cambia archivo
			else{
				$file= File::find($id);

				# borra el archivo anterior
				$archivo = $file->link;
				
				if($archivo != $link){
					unlink($archivo);
				}
				
				$file->title = $title;
				$file->body = $body;
				$file->link = $link;
				$b_section = $file->section_id;
				$file->section_id = $section_id;
				$file->save();

			}
		}
		else{
			echo "Error del servidor no se pudo subir el archivo<br>";
			exit();
		}
	}

	# edita file sin cambiar archivo
	if($id <> ""){
		$file= File::find($id);
		$file->title = $title;
		$file->body = $body;
		$b_section = $file->section_id;
		$file->section_id = $section_id;
		$file->save();
	}	

	header("location:file_list.php");
}


# mostramos con smarty
$sections = Section::all();

$smarty = new Smarty;
$smarty->assign('id', $id);
$smarty->assign('title', $title);
$smarty->assign('body', $body);
$smarty->assign('seccion', $section_id);
$smarty->assign('sections',$sections);
$smarty->display('views/file_form.tpl');