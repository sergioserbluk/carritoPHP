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
    ?>
    <h1>Fruteria y verduleria</h1>
    <h2>Productos</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Comprar</th>
        </tr>
        <?php
            //conecto con la base de datos carritophp usando pdo
            $conexion = new PDO("mysql:host=localhost;dbname=carritophp","root","");
            //consulta a la base de datos
            $consulta = $conexion->query("SELECT * FROM productos");
            //recorro los resultados de la consulta
            while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>";
                echo "<td>" . $fila['descripcion'] . "</td>";
                echo "<td>" . $fila['precio'] . "</td>";
                echo "<td><input type='number' name='cantidad' value='1'></td>";
                echo "<td><a href='ad_carrito.php?id_p=" . $fila['id_p'] . "'>Comprar</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
    

</body>
</html>