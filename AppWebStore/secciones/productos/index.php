<?php
include('../../db.php');
// Recupera todos los registro de la tabla unidades:
$sentencia = $conn->prepare("SELECT p.idProducto,p.descripcion, (SELECT u.sigla FROM unidades u WHERE u.idUnidad=p.idUnidad LIMIT 1)
AS unidad, (SELECT c. categoria FROM categorias c WHERE c.idCategoria=p.idCategoria LIMIT 1) AS categorias, 
 (SELECT pro.nomProveedor FROM proveedores pro WHERE pro.idProveedor=p.idProveedor LIMIT 1) 
AS proveedores ,p.stockMin,p.stockMax,p.stock,p.estado,p.precioVenta FROM productos p");


$sentencia->execute();

$productos= $sentencia->fetchAll(PDO::FETCH_ASSOC);


// Borra el registro de la tabla unidades:
if($_GET){
    $idProducto = $_GET['id'];
    $sentencia = $conn->prepare("DELETE FROM productos WHERE idProducto = ?");
    $resultado = $sentencia->execute([$idProducto]);

    if($resultado ===TRUE){
        $sentencia->execute([$idProducto]);
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
            <h3>Lista de Productos</h3>
            
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
                            <th>descripcion</th>
                            <th>Categoria</th>
                            <th>Proveedor</th>
                            <th>Unidad</th>
                            <th>Stock_Max</th>
                            <th>Stock_Min</th>
                            <th>stock</th>
                            <th>estado</th>
                            <th>precio Venta</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($productos as $producto): ?>
                    <tr class="">
                        <td scope="row"><?php echo $producto['idProducto'];  ?></td>
                        <td><?php echo $producto['descripcion'];  ?></td>
                        <td><?php echo $producto['categorias'];  ?></td>
                        <td><?php echo $producto['proveedores'];  ?></td>
                        <td><?php echo $producto['unidad'];  ?></td>
                        <td><?php echo $producto['stockMin'];  ?></td>
                        <td><?php echo $producto['stockMax'];  ?></td>
                        <td><?php echo $producto['stock'];  ?></td>
                        <td><?php echo $producto['estado'];  ?></td>
                        <td><?php echo $producto['precioVenta'];  ?></td>
                       <td>
                            <a class="btn btn-info" href="show.php?id=<?php echo $producto['idProducto'];  ?>">
                                <i class="bi bi-eye-fill"></i> Ver
                            </a>
                            <a class="btn btn-danger" href="index.php?id=<?php echo $producto['idProducto'];  ?>">
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