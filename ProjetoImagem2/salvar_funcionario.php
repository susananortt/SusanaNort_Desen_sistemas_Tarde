<?php
//FUNÇÃO PARA DIMENSIONAR A IMAGEM
function redimensionarImagem($imagem, $largura, $altura){
    //OBTEM AS DIMENSÕES ORIGINAIS DA IMAGEM
    list($larguraOriginal, $alturaOriginal) = getimagesize($imagem);

    //CRIA UMAS NOVA IMAGEM COM AS DIMENSÕES ESPECIFICADAS
    $novaImagem = imagecreatetruecolor($largura, $altura);

    //CRIA UMAS NOVA IMAGEM A PARTIR DO ARQUIVO ORIGINAL (FORMATO JPEG)
    $imagemOriginal = imagecreatefromjpeg($imagem);

    //COPIA E REDIMENSIONA A IMAGEM ORIGINAL PARA A NOVA IMAGEM
    imagecopyresampled($novaImagem, $imagemOriginal, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);

    //INICIA A SAIDA EM BUFFER PARA CAPTURAR OS DADOS DA IMAGEM
    ob_start();
    imagejpeg($novaImagem);
    $dadosImagem = ob_get_clean(); //OBTEM OS DADOS DA IMAGEM NO BUFFER

    //LIBERA A MEMÓRIA USADA PELAS IMAGENS
    imagedestroy($novaImagem);
    imagedestroy($imagemOriginal);

    return $dadosImagem; //RETORNA OS DADOS DA IMAGEM REDIMENSIONADA
}

//CONEXÃO COM O BANCO DE DADOS
$host = 'localhost';
$dbname = 'bd_imagem';
$username = 'root';
$password = '';

try{
    //CRIA UMA NOVA INSTANCIA DE PDO PARA CONECTAR AO BANCO DE DADOS
    $pdo = new PDO("mysql:host=$host; dbname=$dbname",$username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //DEFINE O MODO DE ERRO DO PDO PARA EXCEÇÕES

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto'])){
        //CODIGO ABAIXO VERIFICA SE NÃO HOUVE ERRO NO UPLOAD DA FOTO
        if($_FILES['foto']['error'] == 0){
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $nomeFoto = $_FILES['foto']['name'];
            $tipoFoto = $_FILES['foto']['type'];

            //REDIMENSIONA A IMAGEM PARA 300X400 PIXELS
            $foto = redimensionarImagem($_FILES['foto']['tmp_name'], 300, 400);

            //PREPARA A INSTRUÇÃO SQL PARA INSERIR OS DADOS DO FUNCIONÁRIO NO BANCO DE DADOS
            $sql = "INSERT INTO funcionarios (nome, telefone, nome_foto, tipo_foto, foto) VALUES (:nome, :telefone, :nome_foto, :tipo_foto, :foto)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome',$nome);
            $stmt->bindParam(':telefone',$telefone);
            $stmt->bindParam(':nome_foto',$nomeFoto);
            $stmt->bindParam(':tipo_foto',$tipoFoto);
            //O CODIGO ABAIXO DEFINE O PARAMETRO DA FOTO COMO LARGE OBJECT (LOB)
            $stmt->bindParam(':foto',$foto, PDO::PARAM_LOB);

            if($stmt->execute()){
                echo "Funcionário cadastrado com sucesso!";
            }else{
                echo "Erro ao cadastrar o funcionário";
            }
        }else{
            echo "Erro ao fazer upload da foto!".$_FILES['foto']['error'];
        }
    }
}catch(PDOExpection $e){
    echo "Erro.". $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Imagens</title>
</head>
<body>
    <h1>Lista de Imagens</h1>

<!-- LINK PARA LISTAR FUNCIONARIOS -->
    <a href = "consultar_funcionario.php">Listar Funcionários</a>
</body>
</html>