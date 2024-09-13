<?php
include('../../db.php');
if($_POST){
    $codProducto= $_POST['codProducto'];
   $descripcion = $_POST['descripcion'];
    $idCategoria = $_POST['idCategoria'];
    $idProveedor = $_POST['idProveedor'];
    $idUnidad = $_POST['idUnidad'];
    $stockMin = $_POST['stockMin'];
    $stockMax = $_POST['stockMax'];
    $stock = $_POST['stock'];
    $fechaRegistro = $_POST['fechaRegistro'];
    $estado = $_POST['estado'];
    $precioCompra= $_POST['precioCompra'];
    $margenUtilidad = $_POST['margenUtilidad'];
    $precioVenta = $_POST['precioVenta'];

   
    $sentencia = $conn->prepare("INSERT INTO productos(codProducto, descripcion, categoria, proveedor, unidad, stockMin, stockMax, stock, fechaRegistro, estado, precioCompra, margenUtilidad, precioVenta) VALUES(?, ?, (SELECT idCategoria FROM categorias WHERE categoria = ?), ?, 
    (SELECT idUnidad FROM unidades WHERE unidad = ?), ?, (SELECT idProveedor FROM proveedores WHERE nomProveedor= ?)?,?,?,?,?,?,?);");

    $resultado = $sentencia->execute([$codProducto,$descripcion,$idCategoria,$idProveedor,$idUnidad,$stockMin,$stockMax,$stock,$fechaRegistro,$estado,$precioCompra,$margenUtilidad,$precioVenta]);
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
        <h1>Crear Producto</h1>
    </div>
    <div class="card-body">
        <form method="POST" action="">
            <div class="mb-3">
                <label for="descripcion" class="form-label">descripcion *</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>
            <div class="mb-3">
                <label for="idProveedor" class="form-label">idProveedor *</label>
                <input type="text" class="form-control" id="idProveedor" name="idProveedor" required>
            </div>
            <div class="mb-3">
                <label for="idCategoria" class="form-label">idCategoria *</label>
                <input type="text" class="form-control" id="idCategoria" name="idCategoria" required>
            </div>
            <div class="mb-3">
                <label for="idUnidad" class="form-label">idUnidad *</label>
                <input type="text" class="form-control" id="idUnidad" name="idUnidad" required>
            </div>
            <div class="mb-3">
                <label for="stockMin" class="form-label">stockMin *</label>
                <input type="text" class="form-control" id="stockMin" name="stockMin" required>
            </div>
            <div class="mb-3">
                <label for="stockMax" class="form-label">stockMax *</label>
                <input type="text" class="form-control" id="stockMax" name="stockMax" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">stock *</label>
                <input type="text" class="form-control" id="stock" name="stock" required>
            </div>
            <div class="mb-3">
                <label for="fechaRegistro" class="form-label">fechaRegistro *</label>
                <input type="text" class="form-control" id="fechaRegistro" name="fechaRegistro" required>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">estado *</label>
                <input type="text" class="form-control" id="estado" name="estado" required>
            </div>
            <div class="mb-3">
                <label for="precioCompra" class="form-label">precioCompra *</label>
                <input type="text" class="form-control" id="precioCompra" name="precioCompra" required>
            </div>
            <div class="mb-3">
                <label for="margenUtilidad" class="form-label">margenUtilidad *</label>
                <input type="text" class="form-control" id="margenUtilidad" name="margenUtilidad" required>
            </div>
            <div class="mb-3">
                <label for="precioVenta" class="form-label">precioVenta *</label>
                <input type="text" class="form-control" id="precioVenta" name="precioVenta" required>
            </div>
           
            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar</button>
            <a class="btn btn-danger" href="index.php"><i class="bi bi-house-x"></i> Cancelar</a>
        </form>
    </div>
    <div class="card-fcardooter text-muted"></div>
<?php
include('../../template/footer.php');
?>