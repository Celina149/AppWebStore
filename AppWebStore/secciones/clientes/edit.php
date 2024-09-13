<?php
include('../../db.php');
// RECUPERA LOS DATOS DEL REGISTRO:
if($_GET){
    $idEmpleados = $_GET['id'];
    $sentencia = $conn->prepare("SELECT * FROM empleados WHERE idEmpleado = ?;");
    $sentencia->execute([$idEmpleados]);
   $empleado = $sentencia->fetch(PDO::FETCH_ASSOC);
}

// ACTUALIZAR LOS DATOS DEL REGISTRO:
if($_POST){
    $idEmpleados = $_POST['idEmpleado'];
   $empleado = $_POST['nombre'];
    $apellido = $_POST['apellido'];


    $sentencia = $conn->prepare("UPDATE empleados SET nombre = ?, apellido = ? WHERE idEmpleado = ?;");
    $resultado = $sentencia->execute([ $idEmpleados,$empleado, $apellido]);

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
        <h1>Información del Empleado</h1>
    </div>
    <div class="card-body">
        
        <form method="POST" action="">
            <div class="mb-3">
                <label for="idEmpleado" class="form-label">ID</label>
                <input type="text" class="form-control" id="idEmpleado" name="idEmpleado" value="<?php echo $empleado['idEmpleado']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">nombre Empleado</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $empleado['nombre']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $empleado['apellido']; ?>" required>
            </div>
       
            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Actualizar</button>

            <a class="btn btn-danger" href="index.php"><i class="bi bi-house-x"></i> Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
<?php
include('../../template/footer.php');
?>