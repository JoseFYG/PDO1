<?php
require '../vendor/autoload.php';

use Clases\Articulos;

$id=$_GET['id'];

$articulo=new Articulos();
$articulo->setId($id);
$datos=$articulo->read();
$datos1=$datos->fetch(PDO::FETCH_OBJ);


if(isset($_POST['editar'])){
    $nombre=trim($_POST['nombre']);
    $pvp=trim($_POST['pvp']);
    $stock=trim($_POST['stock']);

    $articulo->setNombre(ucwords($nombre));
    $articulo->setPvp(ucwords($pvp));
    $articulo->setStock(ucwords($stock));
    $articulo->update();
    $articulo=null;
    header("Location:lista.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Editar Artículos</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body style="background-color:#FF8065;">
<h1 class="text-center m-5">Editar Artículo</h1>
<div class="container text-center">
<form name="nt" action="<?php echo $_SERVER['PHP_SELF']."?id=$id";?>" method="POST">
<div class="mt-2">
<input type="text" name="nombre" value="<?php echo $datos1->nombre; ?>" required class="form-control mb-2"/>
<input type="text" name="pvp" value="<?php echo $datos1->pvp; ?>" required class="form-control mb-2"/>
<input type="text" name="stock" value="<?php echo $datos1->stock; ?>" required class="form-control mb-4"/>
</div>
<div>
<input type="submit" name="editar" value="Editar" class="btn btn-success mr-2"/>
<a href="lista.php" class="btn btn-primary mr-2">Volver</a>
</div>
</form>
</div>
</body>
</html>