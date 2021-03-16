<?php
    $claseVehiculo = $_REQUEST["claseVehiculo"];
    $placa = $_REQUEST["placa"];
    
    //1. cocectar base datos
    $host = "localhost";
    $dbname = "parqueadero";
    $username = "root";
    $contrasena = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $contrasena);

    //2. construir la sentiencia SQL
    $sql = "INSERT INTO vehiculo (id, claseVehiculo, placa) VALUES(NULL, '$claseVehiculo', '$placa')";

    //3.preparar SQL sentencias
    $q = $cnx-> prepare($sql);
    
    //4. ejecutar SQL sentencia
    $resultado = $q->execute();

    $vehiculo = $q->fetchAll();

    if($resultado){
        echo "Vehiculo $placa se guardo bien";
    }
    else
        echo "hubo un error en la creacion del vehiculo $placa";

?>