<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uso de caso</title>
</head>
<body>
    <?php
        $s = "lampada";
        switch($s){
            case "casa":
                print "A casa é amarela";
                break;
            case "arvore":
                print "a árvore é bonita";
                break;
            case "lampada":
                print "joao apagou a lampada";
                break;
            default:
                print "você não selecionou";
                break;
        }
    ?>
    <h4>Susana Nort</h4>
</body>
</html>