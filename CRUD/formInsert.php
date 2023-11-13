<!doctype html>
<html>
<head>
  <title>Alta de artículo</title>
  <link rel="stylesheet" href="../style.css">
</head>  
<body>

<div class="contenedor">

  <form method="post" action="insert.php">
    <label for="titulo">Ingrese titulo del artículo:</label>    
    <input type="text" name="titulo" maxlength="80"  required>
    <br>
    <label for="descripcion">Ingrese descripcion del artículo:
</label>    
    <input type="text" name="descripcion" maxlength="300"  required>
    <br>
    <label for="precio">Ingrese precio disco:</label>    
    <input type="number" name="precio"step="0.3" required>
    <br>
    <label for="categoria">Seleccione categoria:</label>    


  <select name="categoria">
  <?php
    $mysql=new mysqli("localhost","root","","tienda_vinilos");
    if ($mysql->connect_error)
      die("Problemas con la conexión a la base de datos");
  
    $registros=$mysql->query("select id,nombre from categorias") or
      die($mysql->error);
    while ($reg=$registros->fetch_array())
    {
       echo "<option value=\"".$reg['id']."\">".$reg['nombre']."</option>";
    }        
  ?>  
  </select>
  <br>
  <input type="submit" value="Confirmar">
  </form>

  </div>
</body>
</html>