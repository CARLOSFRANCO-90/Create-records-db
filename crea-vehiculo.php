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
           <form action="save-vehiculo.php" method= "POST">
               <P>PARQUEADERO</P>
               <label for="nombre">Ingrese Datos</label>
               <br>
               
               <p>clase vehiculo</p>
               <input type="radio" name= "idClaseVehiculo" value="0"/>Carro
               <input type="radio" name= "idClaseVehiculo" value="1"/>Motocicleta
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