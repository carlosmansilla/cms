<?php
    # chequeo de la sesion
    session_start();
    if(($_SESSION['acceso']!="1")||($_SESSION['type']!="publicador")) {
        header('Location: index.php');
        exit();
    }	