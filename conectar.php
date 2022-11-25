<?php
//conecto con la base de datos
$conexion = mysql_connect("localhost","root","","carritophp") or die("No se pudo conectar con la base de datos");
mysql_select_db("prueba",$conexion) or die("No se pudo seleccionar la base de datos");
?>