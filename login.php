<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="submit">Login</button>
    </form>
    <!-- recibo los datos del formulario por el metodo post -->
    <?php
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            //conecto con la base de datos usando pdo
            $conexion = new PDO("mysql:host=localhost;dbname=carritophp","root","");
            //consulta a la base de datos
            $consulta = $conexion->query("SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'");
            //si la consulta devuelve un resultado
            if($consulta->rowCount() == 1){
                //recupero el dni del usuario
                $fila = $consulta->fetch(PDO::FETCH_ASSOC);
                $dni = $fila['dni'];
                //creo la sesion
                session_start();
                //guardo el nombre de usuario en la sesion
                $_SESSION['username'] = $username;
                $_SESSION['dni'] = $dni;
                //redirecciono a la pagina de index
                header("Location: index.php");
            }else{
                echo "Usuario o contraseña incorrectos";
            }
        }
    ?>
    
</body>
</html>