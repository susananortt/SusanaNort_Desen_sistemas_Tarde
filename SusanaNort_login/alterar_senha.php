<?php
    session_start();
    require_once 'conexao.php';

    //GARANTE QUE O USUARIO ESTEJA LOGADO
    if(!isset($_SESSION['id_usuario'])){
        echo "<script>alert('Acesso Negado!);window.location.href='login.php'</script>";
        exit();
}

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id_usuario = $_SESSION['id_usuario'];
        $nova_senha= $_POST['nova_senha'];
        $confirmar_senha = $_POST['confirmar_senha'];

        if($nova_senha !==$confirmar_senha){
            echo "<script>alert('As senhas não coincidem!');</script>";
        }elseif(strlen($nova_senha)<8){
            echo "<script>alert('A senha deve ter pelo menos 8 caracteres!');</script>";
        }elseif($nova_senha === "temp123"){
            echo "<script>alert('Escolha uma senha diferente de temporária!');</script>";
        }else{
            $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

            //ATUALIZA A SENHA E REMOVE O STATUS DE TEMPORÁRIA

            $sql = "UPDATE usuario SET senha = :senha, senha_temporaria = FALSE 
            WHERE id_usuario = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':senha', $senha_hash);
            $stmt->bindParam(':id', $id_usuario);

            if($stmt->execute()){
                session_destroy(); //FINALIZA A SESSÃO
                echo "<script>alert('Senha alterada com sucesso! Faça login novamente.');window.location.href='login.php';</script>";

            }else{
                echo "<script>alert('Erro ao alterar a senha!');</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Alterar Senha</h2>
    <p>Olá, <strong><?php echo $_SESSION['usuario']; ?></strong> .Digite sua nova senha abaixo:</p>

    <form action="alterar_senha.php" method="POST">
        <label for="nova_senha">Nova Senha</label>
        <input type="password" id="nova_senha" name="nova_senha" required> 

        <label for="confirmar_senha">Confirmar Nova Senha</label>
        <input type="password" id="confirmar_senha" name="confirmar_senha" required> 

        <label>
            <input type="checkbox" onclick="mostrarSenha()">Mostrar Senha
        </label>

        <button type="submit">Salvar Nova Senha</button>
    </form>

    <script>
        function mostrarSenha(){
            var senha1 = document.getElementById("nova_senha");
            var senha2 = document.getElementById("confirmar_senha");
            var tipo = senha1.type === "password" ? "text" : "password";
            var tipo2 = senha2.type === "password" ? "text" : "password";
            senha1.type = tipo;
            senha2.type = tipo2;
        }
    </script>
    
</body>
</html>