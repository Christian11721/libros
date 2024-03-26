<?php
include("conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "SELECT * FROM detalle_autores WHERE id='$id'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_array($query)) {
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <title>Detalles del autor</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
          <h2>Detalles del autor</h2>
          <table class="table table-striped table-bordered">
                <tr>
                    <th>ID</th>
                    <td><?php echo $row['id']; ?></td>
                </tr>
                <tr>
                    <th>Autor</th>
                    <td><?php echo obtenerNombreAutor($row['autor_id']); ?></td>
                </tr>
                <tr>
                    <th>Biografía</th>
                    <td><?php echo $row['biografia']; ?></td>
                </tr>
                <tr>
            </table>
            <div class="text-center">
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
                <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Editar</a>
            </div>
        </div>
    </body>
    </html>
<?php
} else {
    echo "Libro no encontrado";
}
function obtenerNombreAutor($autor_id) {
    global $con;

    $sql = "SELECT nombre FROM autores WHERE id='$autor_id'";
    $resultado = mysqli_query($con, $sql);

    if ($row = mysqli_fetch_array($resultado)) {
        return $row['nombre'];
    }
}
?>