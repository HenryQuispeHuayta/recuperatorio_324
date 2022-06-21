<?php include ('header.php'); ?>
<?php
include "conexion.inc.php";
$ru=$_SESSION["ru"];
$sql1="select * from Inscritos ";
$sql1.="where ru='$ru' ";
$resultado1=mysqli_query($con, $sql1);
$fila1=mysqli_fetch_array($resultado1);
$materia1=$fila1['materia1'];
$materia2=$fila1['materia2'];
// echo $fila1;
?>
<table class="tabla">
    <tr>
        <th>Materia 1</th>
        <th>Materia 2</th>
    </tr>
    <tr>
        <td><?php echo $materia1;?></td>
        <td><?php echo $materia2;?></td>
    </tr>
</table>
<br>
