<?php

if($proceso==' '){
    $cadena=str_split($procesoanterior);
    $proceso=$cadena[0].$cadena[1]+1;
    $sql="select * from FlujoProceso ";
    $sql.="where Flujo='$flujo' and Proceso='$proceso'";
    $resultado=mysqli_query($con, $sql);
    $fila=mysqli_fetch_array($resultado);
    $c=$fila['Rol'];
    // while($c==1){
    //     $sql="select * from FlujoProceso ";
    //     $sql.="where Flujo='$flujo' and Proceso='$proceso'";
    //     $resultado=mysqli_query($con, $sql);
    //     $fila=mysqli_fetch_array($resultado);
    //     $c=$fila['Rol'];
    //     $proceso=$cadena[0].$cadena[1]+1;    
    // }
    // $proceso='P7';
    echo $proceso;
}
?>