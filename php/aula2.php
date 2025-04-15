<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 2</title>
</head>
<body>
    <?php
        //Função usada para definir fuso horário padrão
        date_default_timezone_set('America/Los_Angeles');
        //Manipulando HTML e PHP
        $data_hoje = date ("d/m/Y", time())
    ?>
    <p align="center">Hoje é dia <?php echo $data_hoje; ?>
    </p>

    <?php
        echo "texto";
        echo "Olá Mundo";
        echo "Isso abrange várias linhas. As novas linhas serão saída também.";
        echo "Isso abrange\nmultiplas linhas.A nova linha será \na saída também.";
        echo "Caracteres Escaping são feitos \"Como esse\".<br>";
    ?>

    <?php
        $comida_favorita = "Italiana";
        print $comida_favorita[2];
        echo "<br>";
        $comida_favorita = " Cozinha ".$comida_favorita;
        print $comida_favorita;
    ?>
    <h4>Susana Nort</h4>
</body>
</html>