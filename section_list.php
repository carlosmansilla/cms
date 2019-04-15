<?php
require 'seguridad.php';

# cargamos el archivo de configuracion
require 'config.php';


#----paginate--------
    # maximo por pagina
    $limit = 16;
    # pagina pedida
    $pag = 1;

    if (isset($_GET['pag'])) {    
        $pag = (int) $_GET['pag']; 
        if ($pag < 1) {  $pag = 1; }         
    }

    $offset = ($pag-1) * $limit;
#---------------------
    $filtro = ''; 
    $categoria = '';
    if(isset($_GET['cat'])){
        $categoria = $_GET['cat'];
        $sql = "SELECT SQL_CALC_FOUND_ROWS * 
		FROM sections 
		WHERE category_id = $categoria 
		ORDER BY name ASC LIMIT $offset , $limit"; 
        $filtro = 'cat='.$categoria.'&';    
    }
    else{
        $sql = "SELECT SQL_CALC_FOUND_ROWS * 
				FROM sections 
				ORDER BY name ASC LIMIT $offset , $limit"; 
    }

    # buscamos las secciones
    $secciones = Section::find_by_sql($sql);
    $result =  Section::find_by_sql('SELECT FOUND_ROWS() as rows');
    $total = $result[0]->rows;        
    $totalPag = ceil($total/$limit);   



# mostramos con smarty
$smarty = new Smarty;
$smarty->assign('sections', $secciones);
$smarty->assign('url','section_list.php?');
$smarty->assign('category',$categoria);
$smarty->assign('filtro',$filtro);
$smarty->assign('total_pag', $totalPag); 
$smarty->display('views/section_list.tpl');
