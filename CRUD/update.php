<?php
    $mysql=new mysqli("localhost","root","","tienda_vinilos");
    if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");

      $mysql->query("update disco set 
                           titulo='$_REQUEST[titulo]',
                           descripcion='$_REQUEST[descripcion]',
                           precio=$_REQUEST[precio],
                           categoria_id=$_REQUEST[categoria_id]
              where id=$_REQUEST[id]") or
      die($mysql->error());
     
    $mysql->close();

    header('Location:index.php');
?>  