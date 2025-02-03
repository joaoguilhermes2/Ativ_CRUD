<?php
class Venda {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function registrar($id_cliente, $id_vendedor) {
        $sql = "INSERT INTO vendas (id_cliente, id_vendedor) VALUES (?, ?)";
        return $this->db->insert($sql, [$id_cliente, $id_vendedor]);
    }

    public function listar() {
        $sql = "SELECT * FROM vendas";
        return $this->db->select($sql);
    }
}
?>