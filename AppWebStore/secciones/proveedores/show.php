<?php
include('../../db.php');
//POR MEDIO DEL METODO GET VERIFICAS
if($_GET){
    $idProveedor=$_GET['id'];
    $sentencia=$conn->prepare("SELECT * FROM proveedores WHERE idProveedor=?");
    $sentencia->execute([$idProveedor]);
    $proveedor=$sentencia->fetch(PDO::FETCH_ASSOC);
}
?>
<?php
include('../../template/header.php')
?>
<div class="card">
    <div class="card-header">
        <h1>Informacion del Proveedor</h1>
    </div>
    <div class="card-body">
    <div class="mb-3">
                <label for="unidad" class="form-label">ID Unidad</label>
                <input type="text" class="form-control" id="idProveedor" name="idProveedor"  value="<?php echo $proveedor['idProveedor'];?>" readonly>

            </div>
            <div class="mb-3">
                <label for="nomProveedor" class="form-label">nomProveedor </label>
                <input type="text" class="form-control" id="nomProveedor" name="nomProveedor"  value="<?php echo $proveedor['nomProveedor'];?>" readonly>

            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">tipo </label>
                <input type="text" class="form-control" id="tipo" name="tipo"  value="<?php echo $proveedor['tipo'];?>"  readonly>
            </div>
       
            <div class="mb-3">
                <label for="nombreContacto" class="form-label">nombreContacto </label>
                <input type="text" class="form-control" id="nombreContacto" name="nombreContacto"  value="<?php echo $proveedor['nombreContacto'];?>"  readonly>
            </div>
       
            <a class="btn btn-warning" href="edit.php?id=<?php echo $proveedor['idProveedor']; ?>"><i class="bi bi-pencil"></i> Editar</a>
            <a class="btn btn-danger" href="index.php"><i class="bi bi-house-x"></i> Volver</a>
           
        </form>
        
    </div>
</div>
<div class="card-footer text-muted"></div>

<?php
include('../../template/footer.php')
?>