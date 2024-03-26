<?php 
include("conexion.php");
$con = conectar();

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
<html lang="es">
<head>
    <title>Agregar autores</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>  
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Ingresar datos:
                    </div>
                    <form class="p-4" method="POST" action="insert.php">
                        <div class="mb-3">
                            <label class="form-label">Nombre: </label>
                            <input type="text" class="form-control" name="nombre" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">País: </label>
                            <input type="text" class="form-control" name="pais" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Edad: </label>
                            <input type="text" class="form-control" name="edad" autofocus required>
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" value="Registrar">
                            <button type="button" class="btn btn-secondary" onclick="location.href='index.php'">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>