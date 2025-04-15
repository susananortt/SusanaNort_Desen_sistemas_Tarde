<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Função PHP</title>
</head>
<body>
    <?php
        $name = "Susana Nort";
        $lenght = strlen($name);
        $cmp = strcmp ($name, "Joao");
        $index = strpos($name, "n");
        $first = substr($name, 9, 5);
        $name = strtoupper($name);

        print "$name<br>";
        print "$lenght<br>";
        print "$cmp<br>";
        print "$index<br>";
        print "$first<br>";
        print "$name<br>";
    ?>

    <?php
        $cidade = "Joinville";
        $estado = "SC";
        $idade = 174;
        $frase_capital = "A cidade de $cidade tem a maior população de $estado";
        $frase_idade = "$cidade tem mais de $idade anos";
        echo "<h3>$frase_capital </h3>";
        echo "<h4>$frase_idade </h4>";
    ?>
    <h4>Susana Nort</h4>
</body>
</html>