<?php
include("conexion.php");
$con = conectar();

$id = $_POST['id'];
$autor_id = $_POST['autor_id'];
$titulo = $_POST['titulo'];
$a_publicacion = $_POST['a_publicacion'];
$lugar_edicion = $_POST['lugar_edicion'];
$editorial = $_POST['editorial'];
$paginas = $_POST['paginas'];
$slug = null;

function generarSlug($slug) {
    
    $slug = str_replace(
        array('á','à','ä','â','ª','Á','À','Â','Ä'),
        array('a','a','a','a','a','A','A','A','A'),
        $slug
    );
    $slug = str_replace(
        array('é','è','ë','ê','É','È','Ê','Ë'),
        array('e','e','e','e','E','E','E','E'),
        $slug
    );
    $slug = str_replace(
        array('í','ì','ï','î','Í','Ì','Ï','Î'),
        array('i','i','i','i','I','I','I','I'),
        $slug
    );
    $slug = str_replace(
        array('ó','ò','ö','ô','Ó','Ò','Ö','Ô'),
        array('o','o','o','o','O','O','O','O'),
        $slug
    );
    $slug = str_replace(
        array('ú','ù','ü','û','Ú','Ù','Û','Ü'),
        array('u','u','u','u','U','U','U','U'),
        $slug
    );
   
    $slug = preg_replace('/[^a-zA-Z0-9\s]/', '', $slug);
    $slug = strtolower(trim($slug));
    $slug = preg_replace('/\s+/', '-', $slug);
    return $slug;
}

$slug = $slug = $_POST['titulo'];
$slug1 = generarSlug($slug);

$sql = "INSERT INTO libros VALUES('$id','$autor_id','$titulo','$a_publicacion','$lugar_edicion','$editorial','$paginas', '$slug1')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}
?>