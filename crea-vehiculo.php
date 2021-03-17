<!DOCTYPE html>
<html lang="en">
      <head>
           <title>Ingreso Vehiculo</title>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Document</title>

         <link rel="stylesheet" href="css/styles.css" type="text/css">
         
      </head>
      <body>
           <div class="form">
           <form action="crea-vehiculo.php" method= "POST">
               <P>PARQUEADERO</P>
               <label for="nombre">Ingrese Datos</label>
               <br>
               
               <p>clase vehiculo</p>
               <input type="radio" name= "claseVehiculo" value="0"/>Carro
               <input type="radio" name= "claseVehiculo" value="1"/>Motocicleta
               <br/>
               <p>Placa</p> 
               <input type="text" name="placa">
                <br/> 
                <br/>
                <input type="submit" value ="Guardar">
           </form>
        </div>
    </body>
</html>

<?php
    if(!empty($_POST)){
    $clase = $_REQUEST["claseVehiculo"];
    $plac = $_REQUEST["placa"];
    
    //1. cocectar base datos
    $host = "localhost";
    $dbname = "parqueadero";
    $username = "root";
    $contrasena = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $contrasena);

    //2. construir la sentiencia SQL
    $sql = "INSERT INTO vehiculo (id, claseVehiculo, placa) VALUES(NULL, '$clase', '$plac')";

    //3.preparar SQL sentencias
    $q = $cnx-> prepare($sql);
    
    //4. ejecutar SQL sentencia
    $resultado = $q->execute();

    $vehiculo = $q->fetchAll();

    if($resultado){
        echo "Vehiculo $plac se guardo bien";
    }
    else
        echo "hubo un error en la creacion del vehiculo $plac";
    }

?>