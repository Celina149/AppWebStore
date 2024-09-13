<?php
include('../../db.php');
// Recupera todos los registro de la tabla unidades:
$sentencia = $conn->prepare("SELECT * FROM unidades");
$sentencia->execute();

$unidades = $sentencia->fetchAll(PDO::FETCH_ASSOC);


// Borra el registro de la tabla unidades:
if($_GET){
    $idUnidad = $_GET['id'];
    $sentencia = $conn->prepare("DELETE FROM unidades WHERE idUnidad = ?");
    $resultado = $sentencia->execute([$idUnidad]);

    if($resultado ===TRUE){
        $sentencia->execute([$idUnidad]);
        header('Location: index.php');
    }else{
        echo "Algo salio mal. Por favor verifique que la tabla exista y que el id sea correcto.";
    }
    
}

?>

<?php
include('../../template/header.php');
?>
<br>
<div class="card">
    <div class="card-header">
        <h1>Listado de Unidades</h1><br>
        <a class="btn btn-primary" href="create.php"><i class="bi bi-plus-lg"></i> Crear</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-primary">
            
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Unidad</th>
                        <th scope="col">Sigla</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($unidades as $unidad): ?>
                    <tr class="">
                        <td scope="row"><?php echo $unidad['idUnidad'];  ?></td>
                        <td><?php echo $unidad['unidad'];  ?></td>
                        <td><?php echo $unidad['sigla'];  ?></td>
                        <td>
                            <a class="btn btn-info" href="show.php?id=<?php echo $unidad['idUnidad'];  ?>">
                                <i class="bi bi-eye-fill"></i> Ver
                            </a>
                            <a class="btn btn-danger" href="index.php?id=<?php echo $unidad['idUnidad'];  ?>">
                                <i class="bi bi-trash"></i> Eliminar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
        
    </div>
    <div class="card-footer text-muted">Foooter</div>
</div>

<?php
include('../../template/footer.php');
?>