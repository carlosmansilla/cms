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

    $message = "";
    if (isset($_GET['message'])) {    
        $message = $_GET['message'];        
    }

    $sql = "SELECT SQL_CALC_FOUND_ROWS * 
			FROM categories 
			ORDER BY name ASC LIMIT $offset , $limit"; 

    # buscamos las categorias
    $categorias = Category::find_by_sql($sql);
    $result =  Category::find_by_sql('SELECT FOUND_ROWS() as rows');
    $total = $result[0]->rows;        
    $totalPag = ceil($total/$limit);   


# mostramos con smarty
$smarty = new Smarty;
$smarty->assign('categories', $categorias);
$smarty->assign('url','category_list.php?');
$smarty->assign('filtro','');
$smarty->assign('total_pag', $totalPag);
$smarty->display('views/category_list.tpl');

