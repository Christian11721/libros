<?php
include("conexion.php");
$con = conectar();

function obtenerNombreAutor($autor_id) {
    global $con;

    $sql = "SELECT nombre FROM autores WHERE id='$autor_id'";
    $resultado = mysqli_query($con, $sql);

    if ($row = mysqli_fetch_array($resultado)) {
        return $row['nombre'];
    } 
}
$sql = "SELECT * FROM detalle_autores";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Detalles de los autores</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head> 
<body>
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Lista de autores y premios
        </div>
        <div class="card-body">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Biografía</th>
                        <th scope="col" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($query)) : ?>
                        <tr>
                            <td scope="row"><?php echo $row['id']; ?></td>
                            <td><?php echo obtenerNombreAutor($row['autor_id']); ?></td>
                            <td><?php echo $row['biografia']; ?></td>
                            <td><a href="show.php?id=<?php echo $row['id']; ?>"><i class="bi bi-eye-fill"></i></a></td>
                            <td><a class="text-success" href="update.php?id=<?php echo $row['id']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                            <td><a onclick="return confirm('¿Estás seguro de eliminar?');" class="text-danger" href="delete.php?id=<?php echo $row['id']; ?>"><i class="bi bi-trash"></i></a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="create.php" class="btn btn-primary mt-3">Agregar premio</a>
</div>
</body>
</html>