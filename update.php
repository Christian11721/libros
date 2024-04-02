<?php 
include("conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "SELECT * FROM libros WHERE id='$id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

function obtenerNombresAutores() { //Extrae los nombres de los autores con el valor de sus nombres
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
    <title>Editar libros</title>
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
                            <label class="form-label">Autor: </label>
                            <select class="form-select" name="autor_id" required>
                                <?php
                                $autores = obtenerNombresAutores();
                                foreach ($autores as $id => $nombre) {
                                    $selected = ($row['autor_id'] == $id) ? 'selected' : '';
                                    echo "<option value='{$id}' $selected>{$nombre}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Titulo: </label>
                            <input type="text" class="form-control" name="titulo" autofocus required value="<?= $row['titulo']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Año de publicación: </label>
                            <input type="number" class="form-control" name="a_publicacion" autofocus required value="<?= $row['a_publicacion']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lugar de edicion: </label>
                            <input type="text" class="form-control" name="lugar_edicion" autofocus required value="<?= $row['lugar_edicion']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Editorial: </label>
                            <input type="text" class="form-control" name="editorial" autofocus required value="<?= $row['editorial']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Paginas: </label>
                            <input type="text" class="form-control" name="paginas" autofocus required value="<?= $row['paginas']?>">
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