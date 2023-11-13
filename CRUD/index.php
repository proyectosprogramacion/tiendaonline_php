<!doctype html>
<html>
<head>
  <title>Listado de artículos</title>
  <link rel="stylesheet" href="../style.css">
</head>  
<body>
  
<div class="contenedor">
  
  <?php
    $mysql=new mysqli("localhost","root","","tienda_vinilos");
    if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");

    $registros=$mysql->query("select  ds.id as discoId,
                                         ds.titulo as discoTitulo,
                                         ds.descripcion as discoDescripcion,
                                         ds.precio as precio,
                                         ct.nombre as nombreCategoria
                                      from disco as ds
                                      inner join categorias as ct on ct.id=ds.categoria_id") or
      die($mysql->error);
     
    echo '<table class="tablalistado">';
    echo '<tr><th>Id</th><th>Título</th><th>Descripción</th>
          <th>Precio</th><th>Categoría</th><th>Borrar</th><th>Modificar</th></tr>';
    while ($reg=$registros->fetch_array())
    {
      echo '<tr>';
      echo '<td>';
      echo $reg['discoId'];
      echo '</td>';      
      echo '<td>';
      echo $reg['discoTitulo'];      
      echo '</td>';      
      echo '<td>';
      echo $reg['discoDescripcion'];      
      echo '</td>';      
      echo '<td>';
      echo $reg['precio'];      
      echo '</td>';
      echo '<td>';
      echo $reg['nombreCategoria'];      
      echo '</td>';
      echo '<td>';
      echo '<a class="bt" href="delete.php?id='.$reg['discoId'].'">Borrar</a>';
      echo '</td>';
      echo '<td>';
      echo '<a class="bt" href="formUpdate.php?id='.$reg['discoId'].'">Modificar</a>';
      echo '</td>';      
      echo '</tr>';      
    }    
    echo '<tr><td colspan="8">';
    echo '<a class="bt" href="formInsert.php">Agrega un nuevo artículo</a>';
    echo '</td></tr>';
    echo '<table>';    
    
    $mysql->close();

  ?>  
</div>

</body>
</html>