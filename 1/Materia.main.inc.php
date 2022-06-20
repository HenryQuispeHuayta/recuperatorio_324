<?php
$sql="select * from FlujoProceso ";
$sql.="where Flujo='$flujo' and Proceso='$proceso'";
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
$rol=$fila['Rol'];
if($rol!=1){
    $cadena=str_split($proceso);
    $proceso=$cadena[0].$cadena[1]+1;
    // $proceso='P8';
}
?>