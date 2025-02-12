<?php
include('../App/Classes/Produto.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $produto = new Produto();
    $produto->deletar($id);
    
    echo "Produto excluído com sucesso!";
}
?>