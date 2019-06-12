<?php
include_once 'conexion.php';//enlaza el archivo de la conexion PDO con mysql a este archivo

$sql_sentencia = 'SELECT * FROM facturas'; //seleccionar todo (asterisco) desde tabla 'facturas' de mi db

$gsent = $pdo->prepare($sql_sentencia); // la variable gsent guardara todo lo q se ejecutara en la conexion
$gsent->execute(); //ejecutar variable gsent

$resultado= $gsent->fetchAll();// fetchall devuelve el array, y lo guarda en la ejecucion

//para agregar facturas
if($_POST){
  $tipo= $_POST['Tipo'];
  $fechaemision=$_POST['Fecha_emision'];
  $emisor=$_POST['Emisor'];
  $receptor=$_POST['Receptor'];
  $detalle=$_POST['Detalle'];

$sql_agregar= 'INSERT INTO facturas (Tipo,Fecha_emision,Emisor,Receptor, Detalle) VALUE (?,?,?,?,?)';
$sentencia_agregar= $pdo->prepare($sql_agregar);
$sentencia_agregar->execute(array($tipo, $fechaemision,$emisor,$receptor,$detalle));

header('location:index.php');//header es redireccionar el elemento a la locacion index.php, es decir este doc en el browser
}


 ?>

 <!doctype html>
 <html lang="en">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <title>Hello, world!</title>
   </head>
   <body>

      <div class="container">
         <div class="row">
            <div  class= "col-md-6">

              <?php foreach($resultado as $dato): ?>

                <table class="table table-dark table-hover">
                 <thead>
                   <tr>
                     <th scope="col"> Folio</th>
                     <th scope="col">Tipo</th>
                     <th scope="col"> Fecha emision</th>
                     <th scope="col">Emisor</th>
                     <th scope="col"> Receptor</th>
                     <th scope="col">Detalle</th>
                   </tr>
                 </thead>
                 <tbody>
                   <tr>

                     <td><?php echo $dato['Folio'] ?></td>
                     <td><?php echo $dato['Tipo'] ?></td>
                     <td><?php echo $dato['Fecha_emision'] ?></td>
                     <td><?php echo $dato['Emisor'] ?></td>
                     <td><?php echo $dato['Receptor'] ?></td>
                     <td><?php echo $dato['Detalle'] ?></td>
                   </tr>

                 </tbody>
               </table>
           <?php endforeach ?>
       </div>

         <div class="col-md-6">

           <h3>Agregar Facturas</h3>
           <form class=""  method="POST">

             <table class="table ">
              <thead>
                <tr>

                  <th scope="col">Tipo</th>
                  <th scope="col"> Fecha emision</th>
                  <th scope="col">Emisor</th>
                  <th scope="col"> Receptor</th>
                  <th scope="col">Detalle</th>
                </tr>
              </thead>
              <tbody>
                <tr>

                  <td> <input type="text" class="mt-5" name="Tipo"></td>
                  <td><input type="date" class="mt-5" name="Fecha_emision"></td>
                  <td><input type="text" class="mt-5" name="Emisor"></td>
                  <td><input type="text" class="mt-5" name="Receptor"></td>
                  <td><input type="text" class="mt-5" name="Detalle"></td>
                </tr>

              </tbody>
            </table>
             <button class=" btn btn-danger mt-3"> Agregar </button>

           </form>

         </div>

      </div>

     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
 </html>
