<?php
//Configuração de banco de dados
$servidor="localhost";
$usuario="root";
$senha="";
$banco="empresa_teste";

//Conexão usando MySQL sem proteção contra SQL Injection
$conexao= new mysqli($servidor, $usuario, $senha, $banco);

//Verifica se há erro na conexão
if ($conexao->connect_error){
    die("Erro de conexão:".$conexao->connect_error);
}

//Captura os dados do formulário(nome de usuário)
$nome=$_POST["nome"];

//Prepara a consulta SQL segura
$stmt=$conexao->prepare("SELECT * FROM cliente_teste WHERE nome = ?");
$stmt->bind_param("s", $nome);
$stmt->execute();
$result=$stmt->get_result();

if($result->num_rows>0){
    header("Location:area_restrita.php");
    exit();
}else{
    echo "Nome não encontrado.";
}
//Fecha consulta e conexão
$stmt->close();
$conexao->close();
?>