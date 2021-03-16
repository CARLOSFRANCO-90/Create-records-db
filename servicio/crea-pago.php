<?php
    //1. cocectar base datos
    $host = "localhost";
    $dbname = "parqueadero";
    $username = "root";
    $contrasena = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $contrasena);

    //2. construir la sentiencia SQL
    $sql = "SELECT id, nombre FROM cliente";

    //3.preparar SQL sentencias
    $q = $cnx-> prepare($sql);

    //4. ejecutar SQL sentencia
    $resultado = $q->execute();

    $cliente = $q->fetchAll();
?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea pago</title>
</head>
<body>
    <form action="crea-pago.php" method="POST">
    <P>PARQUEADERO</P>
    <label for="nombre">Ingrese Datos</label>
    <p>Cliente</p>
    <input type="text" name= "nombre" placeholder="idCliente" required>
    <select name="cliente" id="">
<?php
     
        for($i-0; $i<count($cliente); $i++){
?>
         <option value="<?php echo $cliente[$i]['id'] ?>">
         <?php echo $cliente[$i]["nombre"] ?>
         </option>
<?php
        }

?>
    
    </select>
    <br/>
    <input type="radio" name= "idClaseVehiculo" value="0"/>Carro
    <input type="radio" name= "idClaseVehiculo" value="1"/>Motocicleta 
    <p>Entrada</p>
    <input type="radio" name= "entrada" value="5"/>Dia
    <input type="radio" name= "entrada" value="6"/>Noche
    <input type="radio" name= "entrada" value="7"/>Hora 
    <p>Salida</p>
    <input type="radio" name= "salida" value="11"/>Pago Efectivo
    <input type="radio" name= "salida" value="12"/>Pago Targeta
    <br/><br>
   
    <input type="submit" value ="PAGO"> 
    
    </form>
</body>
</html>