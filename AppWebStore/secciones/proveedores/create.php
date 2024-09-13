<?php
include('../../db.php');
if($_POST){
    $nombre_Proveedor = $_POST['nombre_Proveedor'];
    $tipo = $_POST['tipo'];
    $nombre_Contacto = $_POST['contacto'];

    $sentencia = $conn->prepare("INSERT INTO proveedores (nomProveedor, tipo,nombreContacto) VALUES(?, ?,?);");
    $resultado = $sentencia->execute([$nombre_Proveedor, $tipo,$nombre_Contacto]);
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
        <h1>Crear Proveedor</h1>
    </div>
    <div class="card-body">
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nombre_Proveedor" class="form-label">nombre Proveedor *</label>
                <input type="text" class="form-control" id="nombre_Proveedor" name="nombre_Proveedor" required>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo *</label>
                <input type="text" class="form-control" id="tipo" name="tipo" required>
            </div>
            <div class="mb-3">
                <label for="contacto" class="form-label">contacto *</label>
                <input type="text" class="form-control" id="contacto" name="contacto" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar</button>
            <a class="btn btn-danger" href="index.php"><i class="bi bi-house-x"></i> Cancelar</a>
        </form>
    </div>
    <div class="card-fcardooter text-muted"></div>
<?php
include('../../template/footer.php');
?>