<?php

require "../vendor/autoload.php";

use Clases\Articulos;

$articulo=new Articulos();
$articulo->setId($_POST['id']);
$articulo->delete();
$articulo=null;

header(("Location:lista.php"));