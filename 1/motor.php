<?php
include "conexion.inc.php";
session_start();
$flujo=$_GET["flujo"];
$proceso=$_GET["procesoanterior"];
$procesosiguiente=$_GET["proceso"];
$sql="select * from FlujoProceso ";
$sql.="where Flujo='$flujo' and Proceso='$proceso'";
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
$tipo=$fila['Tipo'];
$pantalla=$fila['Pantalla'];
$pantalla.=".motor.inc.php";
$sino="a";
include $pantalla;
echo $sql;
// if($procesosiguiente == " "){
// 	if($tipo=='C'){
// 		$ru=$_SESSION["ru"];
// 		$sql3="SELECT * FROM `Inscritos` WHERE ru='$ru'";
// 		$resultado3=mysqli_query($con, $sql3);
// 		$fila3=mysqli_fetch_array($resultado3);
// 		$pagoCond=$fila["pago"];
// 		$sql4="SELECT * FROM `FlujoProcesoCondicionante` WHERE Flujo='$flujo' AND Proceso='$proceso'";
// 		$resultado4=mysqli_query($con, $sql4);
// 		$fila4=mysqli_fetch_array($resultado4);
// 		$sino=$tipo;
// 		if($pagoCond == 'si'){
// 			$procesosiguiente=$fila4["ProcesoNO"];	
// 		}else{
// 			// $sql4="SELECT * FROM `FlujoProcesoCondicionante` WHERE Flujo='$flujo' AND Proceso='$proceso'";
// 			// $resultado4=mysqli_query($con, $sql4);
// 			// $fila4=mysqli_fetch_array($resultado4);
// 			$procesosiguiente=$fila4["ProcesoSI"];	
// 		}
// 	}
// 	if($cond=='F'){
// 		$procesosiguiente="P1";
// 	}
// }
if (isset($_GET["Anterior"]))
{
	$sql="select * from FlujoProceso ";
	$sql.="where Flujo='$flujo' and ProcesoSiguiente='$proceso'";
	$resultado1=mysqli_query($con, $sql);
	$fila1=mysqli_fetch_array($resultado1);
	print_r ($fila1);
	//$proceso=$fila1["Proceso"];
	$procesosiguiente=$fila1["Proceso"];
	//echo $procesosiguiente;
}
header("Location: principal.php?flujo=$flujo&proceso=$procesosiguiente");
?>