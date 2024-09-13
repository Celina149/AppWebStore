<?php
include('../../db.php');
if($_GET){
    $idUnidad = $_GET['id'];
    $sentencia = $conn->prepare("SELECT * FROM unidades WHERE idUnidad = ?;");
    $sentencia->execute([$idUnidad]);
    $unidad = $sentencia->fetch(PDO::FETCH_ASSOC);
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
        
            <div class="mb-3">
                <label for="idUnidad" class="form-label">ID</label>
                <input type="text" class="form-control" id="idUnidad" name="idUnidad" value="<?php echo $unidad['idUnidad']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="unidad" class="form-label">Unidad</label>
                <input type="text" class="form-control" id="unidad" name="unidad" value="<?php echo $unidad['unidad']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="sigla" class="form-label">Sigla</label>
                <input type="text" class="form-control" id="sigla" name="sigla" value="<?php echo $unidad['sigla']; ?>" readonly>
            </div>
            
            <a class="btn btn-warning" href="edit.php?id=<?php echo $unidad['idUnidad']; ?>"><i class="bi bi-pencil"></i> Editar</a>
            <a class="btn btn-danger" href="index.php"><i class="bi bi-house-x"></i> Volver</a>
        
    </div>
    <div class="card-footer text-muted"></div>
<?php
include('../../template/footer.php');
?>