<?php
include("conexion.php");
$con = conectar();

$id=$_POST["id"];
$autor_id=$_POST["autor_id"];
$titulo = $_POST['titulo'];
$a_publicacion = $_POST['a_publicacion'];
$lugar_edicion = $_POST['lugar_edicion'];
$editorial = $_POST['editorial'];
$paginas = $_POST['paginas'];

$sql="UPDATE libros SET id='$id', autor_id='$autor_id', titulo='$titulo', a_publicacion='$a_publicacion', lugar_edicion='$lugar_edicion', editorial='$editorial', paginas='$paginas' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{
}
?>