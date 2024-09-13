idProveedor	nomProveedor	tipo	nombreContacto	

<?php
include('../../db.php');
if($_POST){
    $unidad = $_POST['unidad'];
    $sigla = $_POST['sigla'];

    $sentencia = $conn->prepare("INSERT INTO unidades (unidad, sigla) VALUES(?, ?);");
    $resultado = $sentencia->execute([$unidad, $sigla]);
    if($resultado === TRUE){
        header('Location: index.php');
    }else{
        echo "Algo salio mal. Por favor verifica que la tabla exista y que los datos sean correctos";
    }
}

include('../../template/header.php');
?>
<div class="card">
    <div class="card-header">
        <h1>Crear Unidad</h1>
    </div>
    <div class="card-body">
        <form method="POST" action="">
            <div class="mb-3">
                <label for="unidad" class="form-label">Unidad *</label>
                <input type="text" class="form-control" id="unidad" name="unidad" required>
            </div>
            <div class="mb-3">
                <label for="sigla" class="form-label">Sigla *</label>
                <input type="text" class="form-control" id="sigla" name="sigla" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar</button>
            <a class="btn btn-danger" href="index.php"><i class="bi bi-house-x"></i> Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
<?php
include('../../template/footer.php');
?>