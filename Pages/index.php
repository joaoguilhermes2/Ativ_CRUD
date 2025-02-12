<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Pages/Css/estilo_index.css">
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Lista de Clientes</h1>
    <a href="adicionar_cliente.php">Adicionar Novo Cliente</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Produtos</th> <!-- Nova coluna para exibir produtos -->
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Incluir o arquivo de cliente
            include('../App/Classes/Cliente.php');
            $cliente = new Cliente();
            $clientes = $cliente->listar();

            foreach ($clientes as $cliente_data) { 
                // Obter os produtos do cliente
                $produtos = $cliente->listarProdutos($cliente_data['id']);
            ?>
                <tr>
                    <td><?php echo $cliente_data['id']; ?></td>
                    <td><?php echo $cliente_data['nome']; ?></td>
                    <td><?php echo $cliente_data['email']; ?></td>
                    <td><?php echo $cliente_data['telefone']; ?></td>
                    <td>
                        <?php
                        // Exibir os produtos do cliente
                        if (count($produtos) > 0) {
                            echo "<ul>";
                            foreach ($produtos as $produto) {
                                echo "<li>" . $produto['nome'] . " (R$ " . number_format($produto['preco'], 2, ',', '.') . ")</li>";
                            }
                            echo "</ul>";
                        } else {
                            echo "Sem produtos";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="editar_cliente.php?id=<?php echo $cliente_data['id']; ?>">Editar</a> |
                        <a href="deletar_cliente.php?id=<?php echo $cliente_data['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a> |
                        <a href="produto_adicionar.php?id_cliente=<?php echo $cliente_data['id']; ?>">Adicionar Produto</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
