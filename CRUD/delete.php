<?php
    $mysql=new mysqli("localhost","root","","tienda_vinilos");
    if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");
  
    $mysql->query("delete from disco where id=$_REQUEST[id]") or
        die($mysql->error);    
    
    $mysql->close();
    
    header('Location:index.php');
  ?>  
?>  