<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function calcFactorial($num){
        $factorial = 1;
        for ($i = 1; $i <=$num; $i++) {
            $factorial *= $i;

    }
    return $factorial;
}
    $number = 4;
    $fact = calcFactorial($number);
    echo"The factorial of $number is $fact";

    ?>
    
</body>
</html>