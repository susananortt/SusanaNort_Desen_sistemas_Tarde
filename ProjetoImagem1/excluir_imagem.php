<?php
//INCLUI O ARQUIVO DE CONEXÃO COM O BANCO DE DADOS
require_once ('conecta.php');

//OBTEM O ID DA IMAGEM DA URL, GARANTINDO QUE SEJA UM NUMERO INTEIRO
$id_imagem = isset($_GET['id']) ? intval($_GET['id']) : 0;

//VERIFICA SE O ID É VALIDO (MAIOR QUE ZERO)
if($id_imagem > 0){
    //CRIA A QUERY SEGURA USANDO O PREPARED STATEMENT
    $queryExclusao = "DELETE FROM tabela_imagem WHERE codigo = ? ";

    //prepara a query
    $stmt = $conexao->prepare($queryExclusao);
    $stmt->bind_param("i",$id_imagem);//DEFINE O ID COMO UM INTEIRO

    //EXECUTA A EXCLUSÃO
    if($stmt->execute()){
        echo "imagem excluida com sucesso!";
    }else{
        die ("Erro ao excluir a imagem!".$stmt->error);
    }

    //FECHA A CONSULTA
    $stmt->close();
}else{
    echo "ID inválido.";
}

//REDIRECIONA PARA A INDEX.PHP E GARANTE QUE O SCRIPT PARE
header("Location: index.php");
exit();
?>