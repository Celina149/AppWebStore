<?php
include('../../db.php');
if($_POST){
    $nombreEmpleado = $_POST['nombre'];
    $apellido= $_POST['apellido'];

    $sentencia = $conn->prepare("INSERT INTO empleados (nombre,apellido) VALUES(?, ?);");
    $resultado = $sentencia->execute([$nombreEmpleado, $apellido]);
    if($resultado === TRUE){
        header('Location: index.php');
    }else{
        echo "Algo salio mal. Por favor verifica que la tabla exista y que los datos sean correctos";
    }
}

include('../../template/header.php');
?>
<div class="card">
    <div class="-header">
        <h1>Crear Empleados</h1>
    </div>
    <div class="card-body">
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nombre" class="form-label">nombre Empleado *</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">apellido *</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
            
            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar</button>
            <a class="btn btn-danger" href="index.php"><i class="bi bi-house-x"></i> Cancelar</a>
        </form>
    </div>
    <div class="card-fcardooter text-muted"></div>
<?php
include('../../template/footer.php');
?>