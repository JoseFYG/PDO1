<?php
use Clases\Articulos;
require '../vendor/autoload.php';

$articulos=new Articulos();
$lista=$articulos->devolverArticulos();
$articulos=null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Listado de Artículos</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body style="background-color:#FF8065;">
<h1 class="text-center m-5">Listado de Artículos</h1>
<a href="crearArt.php" class="btn btn-success ms-5 mb-3">Nuevo Artículo</a>
<div class="mx-5">
<table class="table table-light table-striped text-center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">PVP</th>
      <th scope="col">Stock</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
        while($articulo=$lista->fetch(PDO::FETCH_OBJ)){
            echo "<tr>";
            echo "<th scope='row'>{$articulo->id}</th>";
            echo  "<td>{$articulo->nombre}</td>";
            echo  "<td>{$articulo->pvp} €</td>";
            echo  "<td>{$articulo->stock}</td>";
            echo  "<td>";
            echo "<form name='as' method='POST' class='form-inline' action='borrarArt.php'>"; 
            echo "<a href='editarArt.php?id={$articulo->id}' class='btn btn-warning me-2'>Editar</a>";
            echo "<input type='hidden' name='id' value='{$articulo->id}'>";
            echo "<button type='submit' class='ml-2 btn btn-danger'>Borrar</button></form>";
            echo "</td>\n";
            echo "</tr>\n";
        }
    ?> 
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>
</div>
</body>
</html>