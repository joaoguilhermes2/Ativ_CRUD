<?php
include('../App/Classes/Produto.php');
include('../App/Classes/Venda.php');

$id_cliente = $_GET['id_cliente']; // Obtém o id_cliente da URL

// Listar todos os produtos
$produto = new Produto();
$produtos = $produto->listar();

echo "<h3>Produtos para o Cliente</h3>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Vendas</th>
        </tr>";

foreach ($produtos as $prod) {
    // Contar o número de vendas relacionadas ao produto
    $venda = new Venda();
    $vendas_produto = $venda->listarProdutoVendas($prod['id'], $id_cliente); // Método fictício para listar vendas do produto
    $qtd_vendas = count($vendas_produto);

    echo "<tr>
            <td>{$prod['id']}</td>
            <td>{$prod['nome']}</td>
            <td>{$prod['preco']}</td>
            <td>{$prod['estoque']}</td>
            <td>{$qtd_vendas}</td>
          </tr>";
}

echo "</table>";
?>