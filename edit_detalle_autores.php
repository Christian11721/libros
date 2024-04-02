<?php
include("conexion.php");
$con = conectar();

$id=$_POST["id"];
$autor_id=$_POST["autor_id"];
$biografia = $_POST['biografia'];

$sql="UPDATE detalle_autores SET id='$id', autor_id='$autor_id', biografia='$biografia' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index_detalle_autores.php");
}
?>