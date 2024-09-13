<?php
include('../../db.php');
//POR MEDIO DEL METODO GET VERIFICAS
if($_GET){
    $idEmpleado=$_GET['id'];
    $sentencia=$conn->prepare("SELECT * FROM empleados WHERE idEmpleado=?");
    $sentencia->execute([$idEmpleado]);
    $empleado=$sentencia->fetch(PDO::FETCH_ASSOC);
}
?>
<?php
include('../../template/header.php')
?>
<div class="card">
    <div class="card-header">
        <h1>Informacion del empleado</h1>
    </div>
    <div class="card-body">
    <div class="mb-3">
                <label for="idEmpleado" class="form-label">ID Empleado</label>
                <input type="text" class="form-control" id="idEmpleado" name="idEmpleado"  value="<?php echo $empleado['idEmpleado'];?>" readonly>

            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">nombre </label>
                <input type="text" class="form-control" id="nombre" name="nombre"  value="<?php echo $empleado['nombre'];?>" readonly>

            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">apellido </label>
                <input type="text" class="form-control" id="apellido" name="apellido"  value="<?php echo $empleado['apellido'];?>"  readonly>
            </div>
       
       
            <a class="btn btn-warning" href="edit.php?id=<?php echo $empleado['idEmpleado']; ?>"><i class="bi bi-pencil"></i> Editar</a>
            <a class="btn btn-danger" href="index.php"><i class="bi bi-house-x"></i> Volver</a>
           
        </form>
        
    </div>
</div>
<div class="card-footer text-muted"></div>

<?php
include('../../template/footer.php')
?>