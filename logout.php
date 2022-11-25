<?php
//cierra la sesion
session_start();
session_destroy();
//redirecciona a la pagina de index 
header("Location: index.php");
?>