<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se</title>
</head>
<body>
    <?php
        //Declara variável numérica
        $umidade=91;
        //Testa se $umidade maior que 90. Retorna um boolean
        $vaiChover = ($umidade > 90);
        //Testa se $vaiChover é verdadeiro
        if ($vaiChover)
        {
            echo "Vai chover com toda certeza absoluta da terra!";
        }
    ?>
    <br>
    <?php
        $a = 17;
        if($a>17)
            print "maior de idade<br>";
        else
            print "menor de idade<br>"
    ?>
    <h4>Susana Nort</h4>
</body>
</html>