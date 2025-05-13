<?php

require_once 'conexao.php';

$conexao = conectarBanco();

$busca=$_GET['busca'] ??'';

if(!$busca){
    ?>
    <form action="pesquisarCliente.php" method="GET">
        <label for="busca">Digite o ID ou Nome:</label>
        <input type="text" id="busca" name="busca" requiref>
        <button type="submit">Pesquisar</button>
    </form>
    <?php
    exit;
}

//Escolhe entre busca por Id ou Nome e faz a consulta diretamente

if(is_numeric($busca)){
    $stmt=$conexao->prepare("SELECT id_cliente, nome, endereco, telefone, email
    FROM cliente WHERE id_cliente=:id");
    $stmt->bindParam(":id", $busca, PDO::PARAM_INT);
}else{
    $stmt=$conexao->prepare("SELECT id_cliente, nome, endereco,
    telefone, email FROM cliente WHERE nome LIKE :nome");
    $buscaNome="%$busca%";
    $stmt->bindParam(":nome", $buscaNome, PDO::PARAM_STR);
}

$stmt->execute();
$clientes=$stmt->fetchAll();

if(!$clientes){
    die("Erro: Nenhum cliente encontrado.");
}
?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Ação</th>
</tr>

<?php foreach ($clientes as $cliente):?>
    <tr>
        <td><?=htmlspecialchars($cliente['id_cliente'])?></td>
        <td><?=htmlspecialchars($cliente['nome'])?></td>
        <td><?=htmlspecialchars($cliente['endereco'])?></td>
        <td><?=htmlspecialchars($cliente['telefone'])?></td>
        <td><?=htmlspecialchars($cliente['email'])?></td>
        <td>
            <a href="atualizarCliente.php?id=<?=$cliente['id_cliente']?>">Editar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
    
