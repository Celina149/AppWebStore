<?php
include('../../db.php');
// Recupera todos los registro de la tabla unidades:
$sentencia = $conn->prepare("SELECT * FROM proveedores");
$sentencia->execute();

$proveedores = $sentencia->fetchAll(PDO::FETCH_ASSOC);


// Borra el registro de la tabla unidades:
if($_GET){
    $idProveedor = $_GET['id'];
    $sentencia = $conn->prepare("DELETE FROM proveedores WHERE idProveedor = ?");
    $resultado = $sentencia->execute([$idProveedor]);

    if($resultado ===TRUE){
        $sentencia->execute([$idProveedor]);
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
            <h3>Lista de Proveedores</h3>
            
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
                            <th>Tipo</th>
                            <th>Contacto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($proveedores as $proveedor): ?>
                    <tr class="">
                        <td scope="row"><?php echo $proveedor['idProveedor'];  ?></td>
                        <td><?php echo $proveedor['nomProveedor'];  ?></td>
                        <td><?php echo $proveedor['tipo'];  ?></td>
                        <td><?php echo $proveedor['nombreContacto'];  ?></td>
                       <td>
                            <a class="btn btn-info" href="show.php?id=<?php echo $proveedor['idProveedor'];  ?>">
                                <i class="bi bi-eye-fill"></i> Ver
                            </a>
                            <a class="btn btn-danger" href="index.php?id=<?php echo $proveedor['idProveedor'];  ?>">
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