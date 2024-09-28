<!DOCTYPE html>
<html>

<head>
    <title>Deque in PHP</title>
</head>

<body>
    <h1>Deque (Double-Ended Queue) Example</h1>
    <?php
    $deque = array();

    // Insert at front
    array_unshift($deque, 10);

    // Insert at rear
    array_push($deque, 20);

    echo "<p>Deque after insertion: ";
    print_r($deque);
    echo "</p>";

    // Remove from front
    $front = array_shift($deque);
    echo "<p>Removed from front: $front</p>";

    // Remove from rear
    $rear = array_pop($deque);
    echo "<p>Removed from rear: $rear</p>";

    echo "<p>Deque after removals: ";
    print_r($deque);
    echo "</p>";
    ?>
</body>

</html>