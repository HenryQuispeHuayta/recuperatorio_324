<?php 
// $alerta="";
// session_start();
// if(!empty($_SESSION["activa"])){
//     header("location: principal.php?flujo=F1&proceso=P1");
// }else{
//     if(!empty($_POST)){
//         if(empty($_POST["user"]) || empty($_POST["pass"])){
//             $alerta="Ingresar Usuario y Contraseña";
//         }else{
//             require_once "conexion.inc.php";
//             $user=$_POST["user"];
//             // $pass=$_POST["pass"];
//             $query=mysqli_query($con,"SELECT * FROM Usuario WHERE id='$user' ");
//             $resultado=mysqli_num_rows($query);
//             if($resultado>0){
//                 $dato=mysqli_fetch_array($query);
//                 $_SESSION["activa"]=true;
//                 // $_SESSION["ci"]=$dato["CI"];
//                 // $_SESSION["user"]=$dato["USUARIO"];
//                 // $_SESSION["password"]=$dato["PASSWORD"];

//                 header("location: principal.php?flujo=F1&proceso=P2");
//             }else{
//                 $alerta = "El Usuario o la Contraseña son incorrectos";
//                 session_destroy();
//             }
//         }
//     }    
// }

?>
