<?php
class Produto {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function criar($nome, $preco, $estoque) {
        $sql = "INSERT INTO produtos (nome, preco, estoque) VALUES (?, ?, ?)";
        return $this->db->insert($sql, [$nome, $preco, $estoque]);
    }

    public function listar() {
        $sql = "SELECT * FROM produtos";
        return $this->db->select($sql);
    }

    public function atualizar($id, $nome, $preco, $estoque) {
        $sql = "UPDATE produtos SET nome = ?, preco = ?, estoque = ? WHERE id = ?";
        return $this->db->update($sql, [$nome, $preco, $estoque, $id]);
    }

    public function deletar($id) {
        $sql = "DELETE FROM produtos WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }
}
?>