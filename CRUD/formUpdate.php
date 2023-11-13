<!doctype html>
<html>
<head>
  <title>Modificación de artículo.</title>
  <link rel="stylesheet" href="../style.css">
</head>  


<body>

  <?php
    $mysql=new mysqli("localhost","root","","tienda_vinilos");
    if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");
  
    $registro=$mysql->query("select id,
                                    titulo,
                                    descripcion,
                                    precio,
                                    categoria_id 
                                    from disco where id=$_REQUEST[id]") or
      die($mysql->error);
     
    if ($reg=$registro->fetch_array())
    {
  ?>

       
<div class="contenedor">


<form method="post" action="update.php">
<label for="titulo">Ingrese titulo del artículo:</label>
<input type="text" name="titulo" maxlength="80" value="<?php echo $reg['titulo']; ?>">
<br>
<label for="descripcion">Ingrese descripcion del artículo:</label>
<input class="my-element" type="text" name="descripcion" maxlength="300" value="<?php echo $reg['descripcion']; ?>">      
<br>
Ingrese precio:
<input type="number" name="precio" maxlength="10" step="0.3" value="<?php echo $reg['precio']; ?>">      
<br>
Seleccione categoria:
<select name="categoria_id">
<?php
   $registros=$mysql->query("select id,nombre from categorias") or
   die($mysql->error);
 while ($reg=$registros->fetch_array())
 {
    echo "<option value=\"".$reg['id']."\">".$reg['nombre']."</option>";
 }        
     ?>  
</select>
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">     

<br>

<input class="bt" type="submit" value="Confirmar">
</form>
<?php
    }      
    else
      echo 'No existe un artículo con dicho código';
    
    $mysql->close();

  ?>
  


  </div>


</body>
</html>