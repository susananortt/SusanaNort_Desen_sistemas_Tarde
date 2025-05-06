<?php
//Inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

//Estabelece conexão
$conexao = conectadb();

//Define os novos valores
$nome = "Maria da Silva";
$endereco="Rua Kalamango, 32";
$telefone = "(41)5555-5555";
$email = "mariasilva@teste.com";

//Define o ID do cliente a ser atualizado
$id_cliente = "2";

//Prepara a consulta SQL segura
$stmt = $conexao->prepare("UPDATE cliente SET nome = ?, endereco=?, telefone=?, email=? WHERE id_cliente=?");

//Associa os parâmetros aos valores da consulta
$stmt->bind_param("ssssi", $nome, $endereco, $telefone, $email, $id_cliente);

//Executa a atualização
if($stmt->execute()){
    echo "Cliente atualizado com sucesso!";
}else{
    echo "Erro ao atualizar o cliente:".$stmt->error;
}

//Fecha a consulta e a conexão
$stmt->close();
$conexao->close();
?>