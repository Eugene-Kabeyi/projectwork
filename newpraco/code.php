<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
// Function to calculate the exponential value
function calculateExponential($x, $terms = 10) {
    $result = 1.0; // Initialize the result with the first term (1)
    $factorial = 1.0; // Initialize the factorial with 1! (1)

    for ($i = 1; $i < $terms; $i++) {
        // Calculate the next term in the series
        $term = pow($x, $i) / $factorial;
        $result += $term;

        // Update the factorial for the next iteration
        $factorial *= ($i + 1);
    }

    return $result;
}

// Example usage:
$xValue = 2.0; // Replace with your desired value of x
$numberOfTerms = 10; // Adjust the number of terms as needed

$exponentialResult = calculateExponential($xValue, $numberOfTerms);
echo "e^$xValue ≈ " . round($exponentialResult, 6); // Display the result
?>

</body>
</html>