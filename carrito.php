<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Carrito</h1>
    <?php
        //compruebo si existe la sesion
        session_start();
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
        // verifico si el usuario ya tiene un carrito en la tabla carrito
        $consulta = $conexion->query("SELECT * FROM carrito WHERE dni = " . $_SESSION['dni']);
        //si el usuario no tiene un carrito en la tabla carrito lo creo
        if($consulta->rowCount() == 0){
            $conexion->query("INSERT INTO carrito (dni) VALUES (" . $_SESSION['dni'] . ")");
        }
        //consulta a la tabla carrito,detalle de carrito y productos
        $consulta = $conexion->query("SELECT * FROM carrito INNER JOIN det_carrito ON carrito.id_c = det_carrito.id_c INNER JOIN productos ON det_carrito.id_p = productos.id_p WHERE carrito.dni = " . $_SESSION['dni']);
        //recorro los resultados de la consulta
        while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
            echo "<p>" . $fila['descripcion'] . " - " . $fila['precio'] . " - " . $fila['cant'] . "</p>";
        }
        // seguir comprando o finalizar compra
        echo "<a href='index.php'>Seguir comprando</a>";
        echo "<a href='finalizar_compra.php'>Finalizar compra</a>";


        
    ?>
</body>
</html>