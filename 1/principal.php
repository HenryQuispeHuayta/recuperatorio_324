<?php include ('header.php'); ?>
<div class="nombre">
	<?php echo "Hola ".$_SESSION["nombre"]?>
</div>
<?php
include "conexion.inc.php";
$flujo=$_GET["flujo"];
$proceso=$_GET["proceso"];
$ru=$_SESSION["ru"];
$sql="select * from FlujoProceso ";
$sql.="where Flujo='$flujo' and Proceso='$proceso'";
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
$sql1="select * from Inscritos ";
$sql1.="where ru='$ru' ";
$resultado1=mysqli_query($con, $sql1);
$fila1=mysqli_fetch_array($resultado1);
$rol=$fila['Rol'];
$pantalla=$fila['Pantalla'];
$pantalla.=".inc.php";
$pantallalogica=$fila['Pantalla'];
$pantallalogica.=".main.inc.php";
$procesoanterior=$proceso;
$proceso=$fila['ProcesoSiguiente'];
$sino=$fila1['pago'];
$materia1=$fila1['materia1'];
$materia2=$fila1['materia2'];
$tipo=$fila['Tipo'];
include $pantallalogica;
?>


<form action="motor.php" method="GET">
	<input type="hidden" name="flujo" value="<?php echo $flujo;?>"/>
	<input type="hidden" name="proceso" value="<?php echo $proceso;?>"/>
	<input type="hidden" name="procesoanterior" value="<?php echo $procesoanterior;?>"/>
	<?php include $pantalla; ?>
	<input type="submit" name="Anterior" <?php if($tipo=="I" || $tipo=="F"){?>disabled<?php }?> value="Anterior"/>
	<input type="submit" name="Siguiente" <?php if($tipo=="F"){?>disabled<?php }?> value="Siguiente"/>

</form>