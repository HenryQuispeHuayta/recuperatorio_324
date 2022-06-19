<?php 
$alerta="";
session_start();
if(!empty($_SESSION["activa"])){
    header("location: /1");
}else{
    if(!empty($_POST)){
        if(empty($_POST["user"]) || empty($_POST["pass"])){
            $alerta="Ingresar Usuario y Contraseña";
        }else{
            require_once "conexion.php";
            $user=$_POST["user"];
            $pass=$_POST["pass"];
            $query=mysqli_query($con,"SELECT * FROM Acceso WHERE USUARIO='$user' AND PASSWORD='$pass'");
            $resultado=mysqli_num_rows($query);
            if($resultado>0){
                $dato=mysqli_fetch_array($query);
                $_SESSION["activa"]=true;
                $_SESSION["ci"]=$dato["CI"];
                $_SESSION["user"]=$dato["USUARIO"];
                $_SESSION["password"]=$dato["PASSWORD"];

                header("location: principal.php");
            }else{
                $alerta = "El Usuario o la Contraseña son incorrectos";
                session_destroy();
            }
        }
    }    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Pregunta 3</title>
</head>
<body>
    <section class="secionLogin">
        <form action="" method="post">
            <h3>Iniciar Sesión</h3>
            <img src="../img/login.png" alt="Login">
            <input type="text" name="user" placeholder="Usuario">
            <input type="password" name="pass" placeholder="Contraseña">
            <div class="alerta"><?php echo isset($alerta)?$alerta:"";?></div>
            <input type="submit" value="Ingresar">
        </form>
    </section>
    
</body>
</html>