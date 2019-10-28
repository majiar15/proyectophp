<?php

class producto extends Database{

    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $marca;
    private $socket;

    function __construct() {
        $this->db = Database::conect();
    }

    function getId() {
        return $this->id;
    }

    function getCategoria_id() {
        return $this->categoria_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getOferta() {
        return $this->oferta;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getMarca() {
        return $this->marca;
    }

    function getSocket() {
        return $this->socket;
    }

    function setSocket($socket) {
        $this->socket = $socket;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setPrecio($precio) {
        $this->precio = $this->db->real_escape_string($precio);
    }

    function setStock($stock) {
        $this->stock = $this->db->real_escape_string($stock);
    }

    function setOferta($oferta) {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getAll() {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC;");
        return $productos;
    }



    public function getOne() {
        $productos = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()};");
        return $productos->fetch_object();
    }

    public function getRamdom($limit) {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT {$limit} ");
        return $productos;
    }

    public function save() {
        $sql = "INSERT INTO productos VALUES(NULL, {$this->getCategoria_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, null, CURDATE(), '{$this->getImagen()}', '{$this->getMarca()}','{$this->getSocket()}');";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
    
    public function search($search){
        $sql = "SELECT * FROM productos WHERE nombre like '%".$search."%';";
        $result = $this->db->query($sql);
        return $result;
    }
    
    public function delete() {
        $sql = "DELETE FROM productos WHERE id = {$this->id};";
        $delete = $this->db->query($sql);

        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }

    public function edit() {
        $sql = "UPDATE  productos SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio='{$this->getPrecio()}', stock='{$this->getStock()}' , tipo='{$this->getMarca()}' , socket='{$this->getSocket()}'";

        if ($this->getImagen() != NULL) {
            $sql.=", imagen='{$this->getImagen()}'";
        }
        $sql.="WHERE id ={$this->getId()};";

        $delete = $this->db->query($sql);

        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }

    public function paginacion($page) {
        $sql = "SELECT p.*,c.nombre AS 'catnombre' FROM productos p "
                . "INNER JOIN categorias c ON c.id = p.categoria_id "
                . "WHERE p.categoria_id= {$this->getCategoria_id()} "
                . "ORDER BY id DESC;";

        $producto = $this->db->query($sql);

        $LI = (($page - 1) * 6);
        $productos[1] = ceil($producto->num_rows/6);
        $sql = "SELECT p.*,c.nombre AS 'catnombre' FROM productos p "
                . "INNER JOIN categorias c ON c.id = p.categoria_id "
                . "WHERE p.categoria_id= {$this->getCategoria_id()} "
                . "ORDER BY id DESC LIMIT $LI,6;";

        $productos[2] = $this->db->query($sql);


        return $productos;
    }

}
