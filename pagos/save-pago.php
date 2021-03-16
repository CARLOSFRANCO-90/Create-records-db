<?php
    $fk_cliente = $_REQUEST["fk_cliente"];
    $entrada = $_REQUEST["entrada"];
    $salida = $_REQUEST["salida"];
    
    //1. cocectar base datos
    $host = "localhost";
    $dbname = "parqueadero";
    $username = "root";
    $contrasena = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $contrasena);

    //2. construir la sentiencia SQL
    $sql = "INSERT INTO pago (id, fk_cliente, entrada, salida) VALUES(NULL, '$fk_cliente', '$entrada', '$salida')";
    //3.preparar SQL sentencias
    $q = $cnx-> prepare($sql);
    
    //4. ejecutar SQL sentencia
    $resultado = $q->execute();

    $pago =$q->fetchAll();

    if($resultado){
        echo "Pago $salida se guardo bien";
    }
    else
        echo "hubo un error en la salida del vehiculo";

?>