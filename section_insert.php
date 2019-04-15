<?php
require 'seguridad.php';

# cargamos el archivo de configuracion
require 'config.php';

$id = "";
$name = "";
$description = "";
$category_id = "";

if(isset($_GET['id'])){

	$id = $_GET['id'];
	$seccion = Section::find($id);
	$name = $seccion->name;
	$description = $seccion->description;
	$category_id = $seccion->category_id;
}

elseif(isset($_GET['cat'])){
	$category_id = $_GET['cat'];
}

elseif(isset($_POST['submit'])){

	$id = $_POST['id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$category_id = $_POST['categoria'];

	# nueva categoria
	if($id == ""){
		$seccion = new Section();
		$seccion->name = $name;
		$seccion->description = $description;
		$seccion->category_id = $category_id;
		$seccion->save();


	}
	
	# edita seccion
	else{
		$seccion = Section::find($id);
		$seccion->name = $name;
		$seccion->description = $description;
		$b_category = $seccion->category_id;
		$seccion->category_id = $category_id;
		$seccion->save();
		
	}	

	header("location:section_list.php");
}


# mostramos con smarty
$categories = Category::all();

$smarty = new Smarty;
$smarty->assign('id', $id);
$smarty->assign('name', $name);
$smarty->assign('description', $description);
$smarty->assign('categoria', $category_id);
$smarty->assign('categories',$categories);
$smarty->display('views/section_form.tpl');