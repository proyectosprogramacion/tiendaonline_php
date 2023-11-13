<?php
    $mysql=new mysqli("localhost","root","","tienda_vinilos");
    if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");
  

 

    $mysql->query("insert into disco(titulo,descripcion,precio,categoria_id) 
        values ('$_REQUEST[titulo]','$_REQUEST[descripcion]',$_REQUEST[precio],$_REQUEST[categoria])") or
      die($mysql->error);

      
   
      
    $mysql->close();

    header('Location:index.php');    
?>  