<?php
    require 'seguridad.php';
    
    # cargamos el archivo de configuracion
    require 'config.php';
    
    $id = $_GET['id'];
    $seccion = Section::find($id);

    $sql = "SELECT SQL_CALC_FOUND_ROWS * 
			FROM files 
			WHERE section_id = $id"; 

    $files = File::find_by_sql($sql);
    $result =  File::find_by_sql('SELECT FOUND_ROWS() as rows');
    $total = $result[0]->rows;   


    # si la seccion tiene documentos asociadas no se puede eliminar
	if($total > 0){

		$message = "No se puede eliminar porque la seccion tiene documentos asociadas";
		$back = "section_list.php";

		# mostramos con smarty
		$smarty = new Smarty;
		$smarty->assign('message', $message);
		$smarty->assign('back', $back);
		$smarty->display('views/message.tpl');
		exit();
	}

    $seccion->delete();

    header("location:section_list.php");