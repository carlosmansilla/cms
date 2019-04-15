<?php
# inclue the ActiveRecord library
require_once 'php-activerecord/ActiveRecord.php';
require_once 'smarty/libs/Smarty.class.php';
 
ActiveRecord\Config::initialize(function($cfg){
	$cfg->set_model_directory('models');
    $cfg->set_connections(array('development' => 'mysql://root:@localhost/cms'));
});
