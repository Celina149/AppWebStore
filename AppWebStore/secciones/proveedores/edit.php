<?php
include('../../db.php');
// RECUPERA LOS DATOS DEL REGISTRO:
if($_GET){
    $idProveedor = $_GET['id'];
    $sentencia = $conn->prepare("SELECT * FROM proveedores WHERE idProveedor = ?;");
    $sentencia->execute([$idProveedor]);
    $proveedor = $sentencia->fetch(PDO::FETCH_ASSOC);
}

// ACTUALIZAR LOS DATOS DEL REGISTRO:
if($_POST){
    $idProveedor = $_POST['idProveedor'];
    $proveedor = $_POST['nomProveedor'];
    $tipo = $_POST['tipo'];
    $nombreContacto=$_POST['nombreContacto'];

    $sentencia = $conn->prepare("UPDATE proveedores SET nomProveedor = ?, tipo = ? WHERE idUnidad = ?;");
    $resultado = $sentencia->execute([ $idProveedor,$proveedor, $tipo, $nombreContacto]);

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
        <h1>Información del Proveedor</h1>
    </div>
    <div class="card-body">
        
        <form method="POST" action="">
            <div class="mb-3">
                <label for="idProveedor" class="form-label">ID</label>
                <input type="text" class="form-control" id="idProveedor" name="idProveedor" value="<?php echo $proveedor['idProveedor']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="nomProveedor" class="form-label">nombre Proveedor</label>
                <input type="text" class="form-control" id="nomProveedor" name="nomProveedor" value="<?php echo $proveedor['nomProveedor']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo $proveedor['tipo']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nombreContacto" class="form-label">nombreContacto</label>
                <input type="text" class="form-control" id="nombreContacto" name="nombreContacto" value="<?php echo $proveedor['nombreContacto']; ?>" required>
            </div>
       
            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Actualizar</button>

            <a class="btn btn-danger" href="index.php"><i class="bi bi-house-x"></i> Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
<?php
include('../../template/footer.php');
?>