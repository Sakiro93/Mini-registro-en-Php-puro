<?php

class Producto {

    private $id_Producto;
    private $foto_Producto;
    private $descripcion_Producto;
    private $id_Categoria;
    private $id_Marca;
    private $precio_Producto;
    private $stock_Producto;
    private $iva_Producto;

    public function __construct($id, $foto, $descripcion, $id_Categoria, $id_Marca, $precio, $stock, $iva) {
        $this->id_Producto = $id;
        $this->foto_Producto = $foto;
        $this->descripcion_Producto = $descripcion;
        $this->id_Categoria = $id_Categoria;
        $this->id_Marca = $id_Marca;
        $this->precio_Producto = $precio;
        $this->stock_Producto = $stock;
        $this->iva_Producto = $iva;
    }

    public function __getVar($name) {
        return $this->$name;
    }

    public function __setVar($name, $value) {
        $this->$name = $value;
    }

    public function Cadena() {
        return $this->foto_Prodcuto . ";" . $this->descripcion_Producto . ";" . $this->id_Categoria . ";" . $this->id_Marca . ";" . $this->precio_Producto . ";" . $this->stock_Producto . ";" . $this->iva_Producto;
    }

}
