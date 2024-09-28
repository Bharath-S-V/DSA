<!DOCTYPE html>
<html>

<head>
    <title>HashMap in PHP</title>
</head>

<body>
    <h1>HashMap (Associative Array) Example</h1>
    <?php
    $hashMap = array();

    // Add key-value pairs
    $hashMap['name'] = 'Bharath';
    $hashMap['age'] = 25;

    echo "<p>Name: " . $hashMap['name'] . "</p>";
    echo "<p>Age: " . $hashMap['age'] . "</p>";

    echo "<p>Full HashMap: ";
    print_r($hashMap);
    echo "</p>";
    ?>
</body>

</html>