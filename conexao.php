<?php
//Habilita relatório detalhado de erros no MySQLi
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
/**
 * Função para conectar ao banco de dados
 * Retorna um objeto de conexão MySQLi ou interrompe o script em caso de erro.
 */
function conectadb(){
    //Configuração do banco de dados
    $nomeservidor = "localhost"; //Endereço do servidor MySQL
    $usuario = "root"; //Nome de usuário do banco
    $senha = "root"; //Senha do banco
    $bancodedados = "empresa"; //Nome do banco de dados
    $port = "3307";

    try{
        //Criação da conexão
        $con = new mysqli($nomeservidor, $usuario, $senha, $bancodedados, $port);

        //Definição do conjunto de caracteres para evitar problemas de acentuação
        $con->set_charset("utf8mb4"); //retorna o objeto de conexão
        return $con;
    }catch(Exception $e){
        //Exibe uma mensagem de erro e encerra o script
        die("Erro na conexão:".$e->getMessage());
    }
}
?>