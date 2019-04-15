<?php
require 'seguridad.php';

# cargamos el archivo de configuracion
require 'config.php';

# mostramos con smarty
$smarty = new Smarty;;
$smarty->display('views/admin.tpl');
