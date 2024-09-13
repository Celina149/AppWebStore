<?php
$severname = "localhost";
$username = "webstoredb";
$password = "webstoredb";
$dbname = "webstoredb";

try{
    $conn  =  new PDO(
        "mysql:host=$severname; 
        dbname=$dbname;
        port:3306",
        $username, 
        $password);
        
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión exitosa!";

}catch(PDOException $e){
    echo "Conexión fallida: " . $e->getMessage();
}
?>