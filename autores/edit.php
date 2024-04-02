<?php
include("conexion.php");
$con = conectar();

$id=$_POST["id"];
$nombre=$_POST["nombre"];
$pais = $_POST['pais'];
$edad = $_POST['edad'];

$sql="UPDATE autores SET id='$id', nombre='$nombre', pais='$pais', edad='$edad' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}
?>