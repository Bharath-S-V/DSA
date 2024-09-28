<!DOCTYPE html>
<html>

<head>
    <title>Quick Sort in PHP</title>
</head>

<body>
    <h1>Quick Sort Example</h1>
    <?php
    function quickSort($arr)
    {
        if (count($arr) < 2) return $arr;

        $left = $right = array();
        $pivot = $arr[0];

        for ($i = 1; $i < count($arr); $i++) {
            if ($arr[$i] < $pivot) {
                $left[] = $arr[$i];
            } else {
                $right[] = $arr[$i];
            }
        }

        return array_merge(quickSort($left), array($pivot), quickSort($right));
    }

    $arr = [10, 80, 30, 90, 40, 50, 70];
    $sortedArr = quickSort($arr);

    echo "<p>Sorted Array: ";
    print_r($sortedArr);
    echo "</p>";
    ?>
</body>

</html>