<?php
include("conexion.php");
$con = conectar();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$pais = $_POST['pais'];
$edad = $_POST['edad'];

$sql = "INSERT INTO autores VALUES('$id','$nombre','$pais', '$edad')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{
}
?>