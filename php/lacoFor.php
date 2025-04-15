<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laço For</title>
</head>
<body>
    <?php
        for ($i = 0; $i < 10; $i++){
            print "O quadrado de $i é ".$i*$i."<br/>";
        }
    ?>
    <br>
    <?php
        for($i=2; $n = system('dir /b'); $i++){
            echo($n);
            if($i==10){
                break;
            }
        }
    ?>
    <h4>Susana Nort</h4>
</body>
</html>