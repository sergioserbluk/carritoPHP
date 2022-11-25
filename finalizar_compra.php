<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //levanto la sesion
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
       echo "<h1>ya casi tienes tus pruductos</h1>";
       echo "<h2>Estamos procesando tus pedidos</h2>";
         echo "<h3>Gracias por tu compra</h3>";
         //lo redirecciono a la pagina de inicio
            header("refresh:5;url=index.php");
    ?>
</body>
</html>