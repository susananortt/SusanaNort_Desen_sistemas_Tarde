<?php
//Inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

//Estabelece conexão
$conexao = conectadb();

//Definição dps valores para inserção
$nome = "Susana Nort";
$endereco = "Rua Kalamango, 32";
$telefone = "(41)5555-5555";
$email = "susananort@teste.com";

//Prepara a consulta SQL usando 'prepare()' para evitar um ataque de SQL injection
$stmt = $conexao->prepare("INSERT INTO cliente (nome, endereco, telefone, email) VALUES(?,?,?,?)");

//Associa os parâmetros aos valores da consulta
$stmt->bind_param("ssss", $nome, $endereco,$telefone,$email);

//Executa a inserção
if($stmt->execute()){
    echo "Cliente adicionado com sucesso!";
}else{
    echo "Erro ao adicionar o cliente: ".$stmt->error;
}

//Fecha a consulta e a conexão com o banco de dados
$stmt->close();
$conexao->close();
?>