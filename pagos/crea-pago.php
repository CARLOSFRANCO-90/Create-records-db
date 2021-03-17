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

    //2. construir la sentiencia SQL
    $sql = "SELECT id, fk_cliente FROM vehiculo";
    //3.preparar SQL sentencias
    $q = $cnx-> prepare($sql);
    //4. ejecutar SQL sentencia
    $resultado = $q->execute();

    $pago = $q->fetchAll();
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
    
    <select name="cliente" id="">
    <br/>

<?php
     
        for($i=0; $i<count($cliente); $i++){
?>
         <option value="<?php echo $cliente[$i]['id'] ?>">
         <?php echo $cliente[$i]["nombre"] ?>
         </option>
<?php
        }

?>
    
    </select>
    <br/>
    Pago
    <select name="pago" id="">
<?php
     
        for($i-0; $i<count($pago); $i++){
?>
         <option value="<?php echo $pago[$i]['id'] ?>">
         <?php echo $pago[$i][""] ?>
         </option>
<?php
        }

?>
    </select>
    <input type="radio" name= "fk_cliente" value="0"/>Carro
    <input type="radio" name= "fk_cliente" value="1"/>Motocicleta 
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