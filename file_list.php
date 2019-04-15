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
    $section = ''; 
    $filtro = '';
    if(isset($_GET['sec'])){
        $section = $_GET['sec'];
        $sql = "SELECT SQL_CALC_FOUND_ROWS * 
				FROM files WHERE section_id = $section 
				ORDER BY title ASC LIMIT $offset , $limit"; 
        $filtro = "sec=$section&"; 
    }
    else{
        $sql = "SELECT SQL_CALC_FOUND_ROWS * 
				FROM files 
				ORDER BY title ASC LIMIT $offset , $limit"; 
    }

    # buscamos los documentos
    $files = File::find_by_sql($sql);
    $result =  File::find_by_sql('SELECT FOUND_ROWS() as rows');
    $total = $result[0]->rows;        
    $totalPag = ceil($total/$limit);   



    # mostramos con smarty
    $smarty = new Smarty;
    $smarty->assign('files', $files);
    $smarty->assign('url','file_list.php?');
    $smarty->assign('section',$section);
    $smarty->assign('filtro',$filtro);
    $smarty->assign('total_pag', $totalPag);   
    $smarty->display('views/file_list.tpl');
