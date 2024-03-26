<?php 
include("conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "SELECT * FROM autores WHERE id='$id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

function obtenerNombresAutores() {
    global $con; 

    $sql = "SELECT id, nombre FROM autores";
    $resultado = mysqli_query($con, $sql);

    $autores = array();
    while ($row = mysqli_fetch_array($resultado)) {
        $autores[$row['id']] = $row['nombre'];
    }
    return $autores;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar autores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Ingresar datos:
                    </div>
                    <form class="p-4" method="POST" action="edit.php">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <div class="mb-3">
                            <label class="form-label">Nombre: </label>
                            <input type="text" class="form-control" name="nombre" autofocus required value="<?= $row['nombre']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">País: </label>
                            <input type="text" class="form-control" name="pais" autofocus required value="<?= $row['pais']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Edad: </label>
                            <input type="text" class="form-control" name="edad" autofocus required value="<?= $row['edad']?>">
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" value="Actualizar">
                            <button type="button" class="btn btn-secondary" onclick="location.href='index.php'">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>