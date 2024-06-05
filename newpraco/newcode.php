<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function calcExp($x, $terms){
        $result = 1.0;
        $factorial = 1.0;
        for ($i = 0; $i <$terms; $i++){
            $term = pow($x,$i)/ $factorial;
            $result += $term;
            $factorial *=($i+ 1);

        }
        return $result;
    }
    $s = 2;
    $termNeed = 10;
    $example = calcExp($s,$termNeed);
    echo"<b>e^$s = $example</b>" ;
    echo"My first PHP page<br>Hello World!";
    ?>
</body>
</html>