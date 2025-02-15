<?php

include('../App/DB/Database.php');

class Cliente {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Método para criar um cliente
    public function criar($nome, $email, $telefone) {
        $sql = "INSERT INTO clientes (nome, email, telefone) VALUES (?, ?, ?)";
        return $this->db->insert($sql, [$nome, $email, $telefone]);
    }

    // Método para listar todos os clientes
    public function listar() {
        $sql = "SELECT * FROM clientes";
        return $this->db->select($sql);
    }

    // Adicionando o método listarProdutos na classe Cliente
    public function listarProdutos($id_cliente) {
        $sql = "SELECT p.id, p.nome, p.preco, p.estoque
                FROM produtos p
                INNER JOIN cliente_produto cp ON p.id = cp.id_produto
                WHERE cp.id_cliente = ?";
        return $this->db->select($sql, [$id_cliente]);
    }


    // Método para buscar um cliente por ID
    public function buscar($id) {
        $sql = "SELECT * FROM clientes WHERE id = ?";
        $clientes = $this->db->select($sql, [$id]);
        return $clientes ? $clientes[0] : null;
    }

    // Método para atualizar um cliente
    public function atualizar($id, $nome, $email, $telefone) {
        $sql = "UPDATE clientes SET nome = ?, email = ?, telefone = ? WHERE id = ?";
        return $this->db->update($sql, [$nome, $email, $telefone, $id]);
    }

    // Método para deletar um cliente
    public function deletar($id) {
        $sql = "DELETE FROM clientes WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }
}
?>