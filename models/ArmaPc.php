<?php

class ArmaPc extends Database{

    private $id;
    private $nombre;
    private $marca;
    private $socket;

    public function __construct() {
        $this->db = Database::conect();
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDb() {
        return $this->db;
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

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDb($db) {
        $this->db = $db;
    }

    public function getAllProcesadores() {
        $sql = "SELECT * FROM productos WHERE tipo='{$this->getMarca()}' and categoria_id= "
                . "( SELECT id FROM categorias WHERE nombre = 'procesadores');";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function getAllBoard() {
        $sql = "SELECT * FROM productos WHERE tipo='{$this->getMarca()}' and categoria_id= "
                . "( SELECT id FROM categorias WHERE nombre = 'boards');";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function getAllRam() {
        $sql = "SELECT * FROM productos WHERE socket='{$this->getSocket()}' and categoria_id= "
                . "( SELECT id FROM categorias WHERE nombre = 'memorias RAM');";
        $productos = $this->db->query($sql);
        return $productos;
    }
        public function getAllDiscoDuro($tipo) {
        $sql = "SELECT * FROM productos WHERE categoria_id= "
                . "( SELECT id FROM categorias WHERE nombre = '{$tipo}');";
        $productos = $this->db->query($sql);
        return $productos;
    }
      public function getAllTargetaGrafica() {
        $sql = "SELECT * FROM productos WHERE categoria_id= "
                . "( SELECT id FROM categorias WHERE nombre = 'tarjeta grafica');";
        $productos = $this->db->query($sql);
        return $productos;
    }
          public function getAllChazis() {
        $sql = "SELECT * FROM productos WHERE categoria_id= "
                . "( SELECT id FROM categorias WHERE nombre = 'chazis');";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function getOne() {
        $categoria = $this->db->query("SELECT * FROM categorias WHERE id = {$this->getId()};");
        return $categoria->fetch_object();
    }

    public function save() {
        $sql = "INSERT INTO categorias VALUES (NULL,'{$this->getNombre()}')";
        $save = $this->db->query($sql);



        if (!$save) {
            $result = false;
        }
        $result = true;
        return $result;
    }

}
