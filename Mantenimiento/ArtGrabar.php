<?php

include_once './Conexion.php';
include_once './Producto.php';

function guardarImagen() {
    if (isset($_FILES['imagen'])) {
        $file = $_FILES['imagen'];
        $nombre = $file["name"];        
        if (!empty($nombre)) {
            $ruta_provisional = $file["tmp_name"];
            $carpeta = "../Fotos/";
            $src = $carpeta . $nombre;
            //Revisa la carpeta clientimagen, ahí están las imagenes
            if (!file_exists($src)) {
                move_uploaded_file($ruta_provisional, $src);
            }
        } else {
            $src = $_POST['foto'];
        }
        return $src;
    } else {
        return $_POST['foto'];
    }
}

$con = new Conexion();
if (isset($_POST['opc'])) {
    $valoriva = 0;
    if ($_POST['opc'] == 'I') {
        if (isset($_POST["iva"])) {
            $valoriva = 1;
        }
        $linea = new Producto($_POST["id"], guardarImagen(), $_POST["descripcion"], $_POST["categoria"], $_POST["marca"], $_POST["precio"], $_POST["stock"], $valoriva);
        $con->ejecutar("insert into producto (foto_Producto, descripcion_Producto, id_Categoria, id_Marca, precio_Producto, stock_Producto, iva_Producto) values ('" . $linea->__getVar("foto_Producto") . "','" . $linea->__getVar("descripcion_Producto") . "','" . $linea->__getVar("id_Categoria") . "','" . $linea->__getVar("id_Marca") . "','" . $linea->__getVar("precio_Producto") . "','" . $linea->__getVar("stock_Producto") . "','" . $linea->__getVar("iva_Producto") . "')");
    } else {
        if ($_POST['opc'] == 'E') {
            $id = $_POST['id'];
            $con->ejecutar("delete from producto  where id_Producto= $id");
        } else {
            if (isset($_POST["iva"])) {
                $valoriva = 1;
            }
        
            $linea = new Producto($_POST["id"], guardarImagen(), $_POST["descripcion"], $_POST["categoria"], $_POST["marca"], $_POST["precio"], $_POST["stock"], $valoriva);          
            $con->ejecutar("update producto set foto_Producto = '" . $linea->__getVar("foto_Producto") . "' ," . "descripcion_Producto='" . $linea->__getVar("descripcion_Producto") . "' ," . "id_Categoria='" . $linea->__getVar("id_Categoria") . "' ," . "id_Marca='" . $linea->__getVar("id_Marca") . "' ," . "precio_Producto='" . $linea->__getVar("precio_Producto") . "' ," . "stock_Producto='" . $linea->__getVar("stock_Producto") . "' ," . "iva_Producto='" . $linea->__getVar("iva_Producto") . "' where id_Producto= '" . $linea->__getVar("id_Producto") . "'");
        }
    }
}

header("Location:./PagConArticulo.php");


