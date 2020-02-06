<?php

//require '../Controlador/CtrCategoria.php';
//$AreaCtr = new CtrCategoria();
//echo $_POST['cat']." ".$_POST['mar']." ".$_POST['iva'];
//die();
//$AreaCtr->grabar($_POST);
//header("Location:../Pagina/PagConCategoria.php");


include_once './Conexion.php';
include_once './Validaciones.php';
$con = new Conexion();
$valid = new Validar();
$ubicacion;
if (isset($_POST['opc'])) {
    $id = $_POST['id'];
    if ($_POST['opc'] == 'I') {
        $des = $_POST['des'];
        if ($_POST['Mes'] == 'C') {
            $con->ejecutar("insert into categoria (descripcion_Categoria) values('$des')");
            $ubicacion = "Location:./PagConCategoria.php";
        } else {
            $con->ejecutar("insert into marca (descripcion_Marca) values('$des')");
            $ubicacion = "Location:./PagConMarcas.php";
        }
    } else {
        if ($_POST['opc'] == 'E') {
            $opcion = $_POST['Mes'];
            $val =0;
            if ($_POST['Mes'] == 'C') {
                if( !$valid->validacion($id, $opcion)){
                $con->ejecutar("delete from categoria  where id_Categoria = $id");
                $val=1;
                }
            } else {
                if ($_POST['Mes'] == 'M') {
                    if( !$valid->validacion($id, $opcion)){
                    $con->ejecutar("delete from marca  where id_Marca = $id");
                    $val=1;
                    }
                }
            }
            if ($_POST['Mes'] == 'M') {
                $ubicacion = "Location:./PagConMarcas.php?IdM='$val'";
            } else {
                $ubicacion = "Location:./PagConCategoria.php?IdC='$val'";
            }
        } else {
            $des = $_POST['des'];
            if ($_POST['Mes'] == 'C') {
                $con->ejecutar("update categoria set descripcion_Categoria= '$des'  where id_Categoria= $id");
                $ubicacion = "Location:./PagConCategoria.php";
            } else {
                $con->ejecutar("update marca set  descripcion_Marca = '$des'  where id_Marca= $id");
                $ubicacion = "Location:./PagConMarcas.php";
            }
        }
    }
    header($ubicacion);
}


