<?php
    # destruir la sesion
    session_start();
    $_SESSION['acceso'] = "0";
    $_SESSION["id_user"] = "0";
    $_SESSION['nick'] = "";
    session_destroy();
    header("Location:index.php");
