
<?php

class Validar {


    function validacion($id, $opc) {
        $Bandera = false;
        include_once './Conexion.php';
        $con = new Conexion();
        $registros = $con->consultar("select  id_Categoria cat, id_Marca mar from producto");
        if ($opc == 'M') {
            while ($reg = $registros->fetch_array()) {
                if ($reg['mar'] == $id) {
                    $Bandera = true;
                }
            }
        } else
        {
            
             while ($reg = $registros->fetch_array()) {
                if ($reg['cat'] == $id) {
                    $Bandera = true;
                }
            } 
        }
        return $Bandera;
    }

}

?>
   