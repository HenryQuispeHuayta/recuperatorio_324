<?php
$sql4="SELECT * FROM `FlujoProcesoCondicionante` WHERE Flujo='$flujo' AND Proceso='$proceso'";
$resultado4=mysqli_query($con, $sql4);
$fila4=mysqli_fetch_array($resultado4);
if($sino == "no"){
    $proceso=$fila4["ProcesoNO"];
}else{
    $proceso=$fila4["ProcesoSI"];
    
}
	
// $proceso="P5";
// echo $procesosiguiente;
?>