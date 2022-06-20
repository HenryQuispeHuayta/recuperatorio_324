<?php include ('header.php'); ?>
<?php echo "Hola ".$_SESSION["nombre"]?>
<?php
include "conexion.inc.php";
$flujo=$_GET["flujo"];
$proceso=$_GET["proceso"];
$sql="select * from FlujoProceso ";
$sql.="where Flujo='$flujo' and Proceso='$proceso'";
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
$pantalla=$fila['Pantalla'];
$pantalla.=".inc.php";
$pantallalogica=$fila['Pantalla'];
$pantallalogica.=".main.inc.php";
$procesoanterior=$proceso;
$proceso=$fila['ProcesoSiguiente'];
include $pantallalogica;
?>


<form action="motor.php" method="GET">
	<input type="hidden" name="flujo" value="<?php echo $flujo;?>"/>
	<input type="hidden" name="proceso" value="<?php echo $proceso;?>"/>
	<input type="hidden" name="procesoanterior" value="<?php echo $procesoanterior;?>"/>
	<?php include $pantalla; ?>
	<input type="submit" name="Anterior" value="Anterior"/>
	<input type="submit" name="Siguiente" value="Siguiente"/>


</form>