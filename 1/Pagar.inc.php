Pagar<br>
<?php
echo $_SESSION['ru'];
// echo $sino;
// echo $proceso;
// $sql4="SELECT * FROM `FlujoProcesoCondicionante` WHERE Flujo='$flujo' AND Proceso='$proceso'";
// $resultado4=mysqli_query($con, $sql4);
// $fila4=mysqli_fetch_array($resultado4);
// $sino=$tipo;
// $procesosiguiente=$fila4["ProcesoNO"];	
// echo $procesosiguiente;
// $cadena=str_split($proceso);
// echo $cadena[0].'1';
?>
<!-- <form action="" method="POST"> -->
    <input type="hidden" name="pago" value="no">
    Se Pago
    <input type="checkbox" <?php if($sino=="si"){?>checked<?php }?> name="pago" value="si">
<!-- </form> -->
<br>
