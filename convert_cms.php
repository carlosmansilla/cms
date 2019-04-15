<?php

include 'funciones.php';

//categories

$sql= "CREATE TABLE categories SELECT * FROM categoria";
consultar($sql,$sql);

$sql = "ALTER TABLE  `categories` CHANGE  `nombre`  `name` VARCHAR(255)";
consultar($sql,$sql);

$sql = "ALTER TABLE  `categories` CHANGE  `descripcion`  `description` TEXT";
consultar($sql,$sql);


//sections

$sql= "CREATE TABLE sections SELECT * FROM seccion";
consultar($sql,$sql);

$sql = "ALTER TABLE  `sections` CHANGE  `nombre`  `name` VARCHAR(255)";
consultar($sql,$sql);

$sql = "ALTER TABLE  `sections` CHANGE  `descripcion`  `description` TEXT";
consultar($sql,$sql);

$sql = "ALTER TABLE  `sections` CHANGE  `categoria`  `category_id` INT(11) NOT NUll";
consultar($sql,$sql);


//files

$sql= "CREATE TABLE files SELECT * FROM doc_interno";
consultar($sql,$sql);

$sql = "ALTER TABLE  `files` CHANGE  `titulo`  `title` VARCHAR(255)";
consultar($sql,$sql);

$sql = "ALTER TABLE  `files` CHANGE  `descripcion`  `body` TEXT";
consultar($sql,$sql);

$sql = "ALTER TABLE  `files` CHANGE  `enlace`  `link` VARCHAR(255)";
consultar($sql,$sql);

$sql = "ALTER TABLE  `files` CHANGE  `seccion`  `section_id` INT(11) NOT NUll";
consultar($sql,$sql);

cerrar();
?>