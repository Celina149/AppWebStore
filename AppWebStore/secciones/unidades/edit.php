<?php
include('../../db.php');
// RECUPERA LOS DATOS DEL REGISTRO:
if($_GET){
    $idUnidad = $_GET['id'];
    $sentencia = $conn->prepare("SELECT * FROM unidades WHERE idUnidad = ?;");
    $sentencia->execute([$idUnidad]);
    $unidad = $sentencia->fetch(PDO::FETCH_ASSOC);
}

// ACTUALIZAR LOS DATOS DEL REGISTRO:
if($_POST){
    $idUnidad = $_POST['idUnidad'];
    $unidad = $_POST['unidad'];
    $sigla = $_POST['sigla'];

    $sentencia = $conn->prepare("UPDATE unidades SET unidad = ?, sigla = ? WHERE idUnidad = ?;");
    $resultado = $sentencia->execute([$unidad, $sigla, $idUnidad]);

    if($resultado === TRUE){
        header('Location: index.php');
    }else{
        echo "Algo salio mal. Por favor verifica que la tabla exista y que los datos sean correctos";
    }

}
?>

<?php
include('../../template/header.php');
?>
<div class="card">
    <div class="card-header">
        <h1>Información de la Unidad</h1>
    </div>
    <div class="card-body">
        
        <form method="POST" action="">
            <div class="mb-3">
                <label for="idUnidad" class="form-label">ID</label>
                <input type="text" class="form-control" id="idUnidad" name="idUnidad" value="<?php echo $unidad['idUnidad']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="unidad" class="form-label">Unidad</label>
                <input type="text" class="form-control" id="unidad" name="unidad" value="<?php echo $unidad['unidad']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="sigla" class="form-label">Sigla</label>
                <input type="text" class="form-control" id="sigla" name="sigla" value="<?php echo $unidad['sigla']; ?>" required>
            </div>
            
            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Actualizar</button>

            <a class="btn btn-danger" href="index.php"><i class="bi bi-house-x"></i> Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
<?php
include('../../template/footer.php');
?>