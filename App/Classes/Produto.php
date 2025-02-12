<?php
class Produto {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Adicionar produto
    public function criar($nome, $preco, $estoque, $id_cliente) {
        $sql = "INSERT INTO produtos (nome, preco, estoque) VALUES (?, ?, ?)";
        return $this->db->insert($sql, [$nome, $preco, $estoque]);

        // Pega o ID do produto recém inserido
        $id_produto = $this->db->getLastInsertId();

        // Agora, associamos o produto ao cliente na tabela cliente_produto
        $sql_relacionamento = "INSERT INTO cliente_produto (id_cliente, id_produto) VALUES (?, ?)";
        return $this->db->insert($sql_relacionamento, [$id_cliente, $id_produto]);
    }

    // Listar todos os produtos
    public function listar() {
        $sql = "SELECT * FROM produtos";
        return $this->db->select($sql);
    }

    // Listar todos os produtos de um cliente
    public function listarPorCliente($id_cliente) {
        $sql = "SELECT p.id, p.nome, p.preco, p.estoque
                FROM produtos p
                INNER JOIN cliente_produto cp ON p.id = cp.id_produto
                WHERE cp.id_cliente = ?";
        return $this->db->select($sql, [$id_cliente]);
    }

    // Atualizar produto
    public function atualizar($id, $nome, $preco, $estoque) {
        $sql = "UPDATE produtos SET nome = ?, preco = ?, estoque = ? WHERE id = ?";
        return $this->db->update($sql, [$nome, $preco, $estoque, $id]);
    }

    // Deletar produto
    public function deletar($id) {
        $sql = "DELETE FROM produtos WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }

    // Buscar produto por ID
    public function buscarPorId($id) {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        return $this->db->select($sql, [$id]);
    }
}
?>