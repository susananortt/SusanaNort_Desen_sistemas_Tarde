<?php
//Inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

//Estabelece conexão
$conexao = conectadb();

$id_cliente ="1";

//Prepara a consulta SQL segura
$stmt = $conexao->prepare("DELETE FROM cliente Where id_cliente = ?");

//Associa o parâmetro ao valor da consulta
$stmt->bind_param("i",$id_cliente);

//Executa a exclusão
if($stmt->execute()){
    echo "Cliente removido com sucesso!";
}else{
    echo "Erro ao removedor cliente: ".$stmt->error;}

//Fecha a consulta e a conexão
$stmt->close();
$conexao->close();
?>