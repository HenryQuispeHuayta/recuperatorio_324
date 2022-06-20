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
$pantalla=$fila['Pantalla'];
$pantalla.=".motor.inc.php";
include $pantalla;
// echo $sql;
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
$sql2="select * from FlujoProceso ";
$sql2.="where Flujo='$flujo' and Proceso='$proceso'";
$resultado2=mysqli_query($con, $sql2);
$fila2=mysqli_fetch_array($resultado2);
$procesosiguiente2=$fila2["ProcesoSiguiente"];

if(!isset($procesosiguiente2)){
	$sql3="SELECT * FROM `FlujoProcesoCondicionante` WHERE Flujo='$flujo' AND Proceso='$proceso'";
	$resultado3=mysqli_query($con, $sql3);
	$fila3=mysqli_fetch_array($resultado3);
	$procesosiguiente=$fila3["ProcesoSI"];
}
header("Location: principal.php?flujo=$flujo&proceso=$procesosiguiente");
?>