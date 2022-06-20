<?php 
$alerta="";
session_start();
if(!empty($_SESSION["activa"])){
    echo "a";
    header("location: ");
}else{
    if(!empty($_POST)){
        if(empty($_POST["user"]) || empty($_POST["pass"])){
            $alerta="Ingresar Usuario y Contraseña";
        }else{
            require_once "conexion.inc.php";
            $user=$_POST["user"];
            $pass=$_POST["pass"];
            $query=mysqli_query($con,"SELECT * FROM Usuarios WHERE ru='$user' AND pass='$pass'");
            $resultado=mysqli_num_rows($query);
            if($resultado>0){
                $dato=mysqli_fetch_array($query);
                $_SESSION["activa"]=true;
                $_SESSION["ru"]=$dato["ru"];
                $_SESSION["pass"]=$dato["pass"];
                $_SESSION["id"]=$dato["id"];
                if($_SESSION["id"] == "1"){
                    header("location: principal.php?flujo=F1&proceso=P1");
                    $sql1=mysqli_query($con,"SELECT * FROM Alumno WHERE ru='$user' AND id='1'");
                    $dato1=mysqli_fetch_array($sql1);
                    $_SESSION["nombre"]=$dato1["nombre"];
                }else{
                    header("location: principal.php?flujo=F1&proceso=P4");
                    $sql2=mysqli_query($con,"SELECT * FROM Kardex WHERE ru='$user' AND id='2'");
                    $dato2=mysqli_fetch_array($sql2);
                    $_SESSION["nombre"]=$dato2["nombre"];
                }

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
        <form action="" method="POST">
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