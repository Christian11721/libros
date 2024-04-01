<?php
include("conexion.php");
$con = conectar();

$id=$_GET["id"];

$sql="DELETE FROM detalle_autores WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index_detalle_autores.php");
}else{  
}
?>