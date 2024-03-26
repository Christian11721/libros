<?php
function conectar(){
$host = "localhost";
$user = "root";
$password ="";
$db = "libreria";
     
$con=mysqli_connect($host, $user, $password);
mysqli_select_db($con, $db);

return $con;
}
?>