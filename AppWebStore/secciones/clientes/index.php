<?php
include('../../db.php');
// Recupera todos los registro de la tabla unidades:
$sentencia = $conn->prepare("SELECT * FROM empleados");
$sentencia->execute();

$empleados= $sentencia->fetchAll(PDO::FETCH_ASSOC);


// Borra el registro de la tabla unidades:
if($_GET){
    $idEmpleado = $_GET['id'];
    $sentencia = $conn->prepare("DELETE FROM empleados WHERE idEmpleado = ?");
    $resultado = $sentencia->execute([$idEmpleado]);

    if($resultado ===TRUE){
        $sentencia->execute([$idEmpleado]);
        header('Location: index.php');
    }else{
        echo "Algo salio mal. Por favor verifique que la tabla exista y que el id sea correcto.";
    }
    
}

?>

<?php
include('../../template/header.php')
?>
<br>
<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            <h3>Lista de Empleados</h3>
            
        </div>
        <div class="card-body">
            <div>
            <br>
        <a class="btn btn-primary" href="create.php"><i class="bi bi-plus-lg"></i> Crear</a>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($empleados as $empleado): ?>
                    <tr class="">
                        <td scope="row"><?php echo $empleado['idEmpleado'];  ?></td>
                        <td><?php echo $empleado['nombre'];  ?></td>
                        <td><?php echo $empleado['apellido'];  ?></td>
                 
                       <td>
                            <a class="btn btn-info" href="show.php?id=<?php echo $empleado['idEmpleado'];  ?>">
                                <i class="bi bi-eye-fill"></i> Ver
                            </a>
                            <a class="btn btn-danger" href="index.php?id=<?php echo $empleado['idEmpleado'];  ?>">
                                <i class="bi bi-trash"></i> Eliminar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
        </div>
        <div class="card-footer text-muted">Footer</div>
    </div>
    
</div>

<?php
include('../../template/footer.php');
?>