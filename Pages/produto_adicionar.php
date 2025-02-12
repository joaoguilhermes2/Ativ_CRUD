<?php
include('../App/Classes/Produto.php');
include('../App/Classes/Venda.php');
include('../App/DB/database.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $produto = new Produto();
    $produto->criar($nome, $preco, $estoque, $id_cliente);
    
    echo "Produto adicionado com sucesso!";
}
?>

<form method="POST">
    Nome: <input type="text" name="nome" required><br>
    Preço: <input type="number" step="0.01" name="preco" required><br>
    Estoque: <input type="number" name="estoque" required><br>
    <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">
    <input type="submit" value="Adicionar Produto">
</form>
<br>
    <a href="index.php">Voltar para a lista de clientes</a>