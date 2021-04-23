<?php
namespace Clases;
use Clases\Conexion;
use PDOException;
use PDO;
class Articulos extends Conexion{

private $id;
private $nombre;
private $pvp;
private $stock;

public function __construct()
{
    parent::__construct();
}

//CRUD
public function create(){
    $consulta="insert into articulos(nombre, pvp, stock) values(:n, :p, :s)";
    $stmt=parent::$conexion->prepare($consulta);
    try{
        $stmt->execute([
            ':n'=>$this->nombre,
            ':p'=>$this->pvp,
            ':s'=>$this->stock
        ]);
    }catch(PDOException $ex){
        die("Error al insertar un articulo: ".$ex->getMessage());
    }
}
public function read(){
    $consulta="select * from articulos where id=:i";
    $stmt = parent::$conexion->prepare($consulta);
    try {
        $stmt->execute([':i' => $this->id]);
    } catch (PDOException $ex) {
        die("Error al leer un articulo: " . $ex->getMessage());
    }
    return $stmt;
}
public function update(){
    $consulta="update articulos set nombre=:n, pvp=:p, stock=:s where id=:i";
    $stmt = parent::$conexion->prepare($consulta);
    try {
        $stmt->execute([
            ':i' => $this->id,
            ':n' => $this->nombre,
            ':p' => $this->pvp,
            ':s' => $this->stock
        ]);
    } catch (PDOException $ex) {
        die("Error al actualizar articulo: " . $ex->getMessage());
    }
}
public function delete(){
    $consulta="delete from articulos where id=:i";
    $stmt=parent::$conexion->prepare($consulta);
    try{
        $stmt->execute([
            ':i'=>$this->id
        ]);
    }catch(PDOException $ex){
        die("Error al borrar el articulo: ".$ex->getMessage());
    }
}

public function devolverArticulos(){
    $consulta="select * from articulos order by id";
    $stmt=parent::$conexion->prepare($consulta);
    try{
        $stmt->execute();
    }catch(PDOException $ex){
        die("Error al devolver articulos: ".$ex->getMessage());
    }
    return $stmt;
}

public function comprobarArticulo($articulo){
    $consulta="select * from articulos where nombre=:n";
    $stmt=parent::$conexion->prepare($consulta);
    try{
        $stmt->execute([
            ':n'=>$articulo
        ]);
    }catch(PDOException $ex){
        die("Error al comprobar articulo: ".$ex->getMessage());
    }
    $fila=$stmt->fetch(PDO::FETCH_OBJ);
    return ($fila==null) ? true : false;
}

//---------------

public function getId()
{
return $this->id;
}

public function setId($id)
{
$this->id = $id;

return $this;
}

public function getNombre()
{
return $this->categoria;
}

public function setNombre($nombre)
{
$this->nombre = $nombre;

return $this;
}

public function getPvp()
{
return $this->categoria;
}

public function setPvp($pvp)
{
$this->pvp = $pvp;

return $this;
}

public function getStock()
{
return $this->categoria;
}

public function setStock($stock)
{
$this->stock = $stock;

return $this;
}
}