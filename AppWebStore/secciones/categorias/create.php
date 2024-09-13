<?php
include('../../db.php');
if($_POST){
    $nombreCategoria = $_POST['categoria'];
    $descripcion= $_POST['descripcion'];

    $sentencia = $conn->prepare("INSERT INTO categorias (categoria,descripcion) VALUES(?, ?);");
    $resultado = $sentencia->execute([$nombreCategoria, $descripcion]);
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
        <h1>Crear categorias</h1>
    </div>
    <div class="card-body">
        <form method="POST" action="">
            <div class="mb-3">
                <label for="categoria" class="form-label">categoria *</label>
                <input type="text" class="form-control" id="categoria" name="categoria" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">descripcion *</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>
            
            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar</button>
            <a class="btn btn-danger" href="index.php"><i class="bi bi-house-x"></i> Cancelar</a>
        </form>
    </div>
    <div class="card-fcardooter text-muted"></div>
<?php
include('../../template/footer.php');
?>