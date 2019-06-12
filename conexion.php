<?php

 $enlace = 'mysql:host=localhost;dbname=billing_software';
 $usuario= 'root';//esto esta en la pagina de MAMP de mi host
 $password= 'root';

 try{
   $pdo=new PDO($enlace,$usuario,$password);//esto esta en la pagina de php es por default asi

   echo 'Conectado exitosamente';

 }catch (PDOException $e) {
   print "¡Error!: " .$e->getMessage()."<br/>";
   die();
  }

 ?>
