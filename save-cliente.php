<?php
    $nombre = $_REQUEST["nombre"];
    $direccion = $_REQUEST["direccion"];
    $telefono = $_REQUEST["telefono"];
    
    //1. cocectar base datos
    $host = "localhost";
    $dbname = "parqueadero";
    $username = "root";
    $contrasena = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $contrasena);

    //2. construir la sentiencia SQL
    $sql = "INSERT INTO cliente (id, nombre, direccion, telefono) VALUES(NULL, '$nombre', '$direccion', '$telefono')";

    //3.preparar SQL sentencias
    $q = $cnx-> prepare($sql);
    
    //4. ejecutar SQL sentencia
    $resultado = $q->execute();

    if($resultado){
        echo "Cliente $nombre se guardo bien";
    }
    else
        echo "hubo un error en la creacion del cliente $nombre";

?>