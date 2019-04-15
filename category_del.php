<?php
require 'seguridad.php';

# cargamos el archivo de configuracion
require 'config.php';

$id = $_GET['id'];
$category = Category::find_by_id($id);

$sql = "SELECT SQL_CALC_FOUND_ROWS * 
		FROM sections 
		WHERE category_id = $id"; 

$sections = Section::find_by_sql($sql);
$result =  Section::find_by_sql('SELECT FOUND_ROWS() as rows');
$total = $result[0]->rows;   

# si la categoria tiene secciones asociadas no se puede eliminar
if($total > 0){

	$message = "No se puede eliminar porque la categoria tiene secciones asociadas";
	$back = "category_list.php";

	# mostramos con smarty
	$smarty = new Smarty;
	$smarty->assign('message', $message);
	$smarty->assign('back', $back);
	$smarty->display('views/message.tpl');
	exit();
}

$category->delete();

header("location:category_list.php");