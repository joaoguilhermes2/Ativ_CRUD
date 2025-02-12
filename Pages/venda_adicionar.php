<?php
include('../App/Classes/Venda.php');
include('../App/Classes/Produto.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $id_vendedor = $_POST['id_vendedor'];

    $venda = new Venda();
    $venda->registrar($id_cliente, $id_vendedor);
    
    echo "Venda registrada com sucesso!";
}
?>

<form method="POST">
    ID Cliente: <input type="number" name="id_cliente" required><br>
    ID Vendedor: <input type="number" name="id_vendedor" required><br>
    <input type="submit" value="Registrar Venda">
</form>