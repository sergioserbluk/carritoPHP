<?php
//agrego el producto a la tabla carrito
session_start();
//compruebo si existe la sesion
if(isset($_SESSION['username'])){
    //si existe la sesion muestro el contenido de la pagina
    echo "Bienvenido " . $_SESSION['username'];
    echo "<a href='logout.php'>Cerrar sesion</a>";
}else{
    //si no existe la sesion muestro el formulario de login
    echo "No estas logueado";
    echo "<a href='login.php'>Login</a>";
}
//conecto con la base de datos carritophp usando pdo
$conexion = new PDO("mysql:host=localhost;dbname=carritophp","root","");
//verifico si el usuario ya tiene un carrito en la tabla carrito
$consulta = $conexion->query("SELECT * FROM carrito WHERE dni = '" . $_SESSION
['dni'] . "'");
//si el usuario no tiene un carrito en la tabla carrito
if($consulta->rowCount() == 0){
    //creo un carrito para el usuario
    $conexion->query("INSERT INTO carrito (dni) VALUES ('" . $_SESSION['dni'] . "')");
}
//agrego el producto al carrito
$conexion->query("INSERT INTO det_carrito (id_c,id_p,cant) VALUES ((SELECT id_c FROM carrito WHERE dni = '" . $_SESSION['dni'] . "')," . $_GET['id_p'] . ",1)");
//redirecciono a la pagina de productos
header("Location: carrito.php");
?>