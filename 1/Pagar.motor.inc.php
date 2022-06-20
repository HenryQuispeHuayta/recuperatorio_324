<?php
$pago = $_GET["pago"];
$sql="update Inscritos set ";
$sql.="pago='$pago' ";
$sql.="where ru=".$_SESSION["ru"];
$resultado=mysqli_query($con, $sql);

// echo $sino;
?>