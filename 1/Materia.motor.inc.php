<?php
$materia1 = $_GET["materia1"];
$materia2 = $_GET["materia2"];
$sql="update Inscritos set ";
$sql.="materia1='$materia1', materia2='$materia2' ";
$sql.="where ru=".$_SESSION["ru"];
$resultado=mysqli_query($con, $sql);

?>