<?php
# cargamos el archivo de configuracion
require 'config.php';

$mensaje = "";

# control de login de usuario
if ( isset( $_POST['nick'] ) and isset( $_POST['pass'] ) ){

	# se limpian variables
	$nick = htmlspecialchars(trim($_POST["nick"]), ENT_QUOTES);        
	$pass = htmlspecialchars(trim($_POST["pass"]), ENT_QUOTES);
    
    $pass = sha1($pass);

	if($nick != "" && $pass != ""){

		$user = User::find_by_nick($nick);
		if($user == null){
            $mensaje = "usuario no existe";
        }
        elseif($user->pass == $pass){
			session_start();
  			$_SESSION['acceso'] = "1";
			$_SESSION['id_user'] = $user->id;
			$_SESSION['nick'] = $user->nick;
            $_SESSION['type'] = $user->type;
			header("Location:admin.php");
			exit();
		}
	}
}


# mostramos la pagina con smarty
$smarty = new Smarty;

# muestra 
$categorias = Category::find('all',array('order' => 'name asc'));  
$titulo = "";
$descripcion = "";
$totalPag = "";

# muestra los documentos de la seccion
if (isset($_GET["sec"])) {    
    $seccion = $_GET["sec"]; 
    
    #----paginate--------
    # maximo por pagina
    $limit = 16;
    # pagina pedida
    $pag = 1;

    if (isset($_GET["pag"])) {    
    $pag = (int) $_GET["pag"]; 
    if ($pag < 1) {  $pag = 1; }         
    }

    $offset = ($pag-1) * $limit;
    #--------------------
    
    $sql = "SELECT SQL_CALC_FOUND_ROWS * 
			FROM files 
			WHERE section_id = $seccion 
			ORDER BY title ASC LIMIT $offset , $limit"; 
    $files = File::find_by_sql($sql);
    $result =  File::find_by_sql('SELECT FOUND_ROWS() as rows');
    $total = $result[0]->rows;        
    $totalPag = ceil($total/$limit);   

    $smarty->assign('files', $files);
    
    $section = Section::find($seccion);
	
	$titulo = strtoupper( $section->category->name ." / ". $section->name );
	$descripcion = $section->description;
 
    $smarty->assign('url','index.php?');
    $smarty->assign('filtro','sec='.$seccion.'&');
}

$smarty->assign('mensaje', $mensaje);
$smarty->assign('categories', $categorias);  
$smarty->assign('titulo', $titulo);
$smarty->assign('descripcion', $descripcion);
$smarty->assign('total_pag', $totalPag); 
$smarty->display('views/index.tpl');

