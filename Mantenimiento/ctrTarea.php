<?php

include_once './Conexion.php';

class marca {

    public $codigo;
    public $nombre;

    function __construct($id = 0, $nombre = '') {
        $this->codigo = $id;
        $this->nombre = $nombre;
    }

    public function __toString() {
        return json_encode($this);
    }

}
if (!empty($_POST)) {
    $caso = $_POST['caso'];
    $marca = array();
    $con = new Conexion();
    $registros = $con->consultar("select * from marca where id_Categoria = '" . $caso . "'");
    while ($reg = $registros->fetch_array()) {
        $marca[] = new marca($reg[0], $reg[1]);
    }
    echo json_encode($marca);
}
