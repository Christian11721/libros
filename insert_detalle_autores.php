<?php
include("conexion.php");
$con = conectar();

$id = $_POST['id'];
$autor_id = $_POST['autor_id'];
$biografia = $_POST['biografia'];

$sql = "INSERT INTO detalle_autores VALUES('$id','$autor_id','$biografia')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index_detalle_autores.php");
}else{
}
?>