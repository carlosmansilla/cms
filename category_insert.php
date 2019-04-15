<?php
require 'seguridad.php';

# cargamos el archivo de configuracion
require 'config.php';

$id = "";
$name = "";
$description = "";

if(isset($_GET['id'])){

	$id = $_GET['id'];
	$categoria = Category::find($id);
	$name = $categoria->name;
	$description = $categoria->description;
}

if(isset($_POST['submit'])){

	$id = $_POST['id'];
	$name = $_POST['name'];
	$description = $_POST['description'];

	# nueva categoria
	if($id == ""){
		$categoria = Category::create(array(
				'name'=> $name,
				'description'=> $description
				));
		$categoria->save();
	}
	# edita categoria
	else{
		$categoria = Category::find($id);
		$categoria->name = $name;
		$categoria->description = $description;
		$categoria->save();
	}	

	header("location:category_list.php");
}

# mostramos con smarty
$smarty = new Smarty;
$smarty->assign('id', $id);
$smarty->assign('name', $name);
$smarty->assign('description', $description);
$smarty->display('views/category_form.tpl');