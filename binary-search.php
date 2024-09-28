<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binary Search Visualization</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .array-box {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin: 0 5px;
            text-align: center;
            line-height: 40px;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
        }

        .highlight {
            background-color: #ffeeba;
        }

        .found {
            background-color: #28a745;
            color: #fff;
        }

        .searched {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-5">Binary Search Visualization</h1>

        <!-- Binary Search Section with Visualization -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>Binary Search</h2>
            </div>
            <div class="card-body">
                <p>Binary Search works by dividing the sorted array into halves and narrowing the search range based on the middle element. The process continues until the element is found or the search range becomes empty.</p>

                <div id="array-container" class="text-center mb-3">
                    <?php
                    $array = [2, 3, 4, 10, 40];
                    $target = isset($_POST['target']) ? (int)$_POST['target'] : null;
                    $resultMessage = '';
                    $highlighted = array_fill(0, count($array), '');

                    if ($target !== null) {
                        $low = 0;
                        $high = count($array) - 1;

                        while ($low <= $high) {
                            $mid = floor(($low + $high) / 2);
                            $highlighted[$mid] = 'highlight'; // Highlight mid

                            if ($array[$mid] === $target) {
                                $highlighted[$mid] = 'found'; // Mark as found
                                $resultMessage = "Element found at index $mid";
                                break;
                            } elseif ($array[$mid] < $target) {
                                for ($i = $low; $i <= $mid; $i++) {
                                    $highlighted[$i] = 'searched'; // Mark left half as searched
                                }
                                $low = $mid + 1;
                            } else {
                                for ($i = $mid; $i <= $high; $i++) {
                                    $highlighted[$i] = 'searched'; // Mark right half as searched
                                }
                                $high = $mid - 1;
                            }
                        }

                        if ($resultMessage === '') {
                            $resultMessage = "Element not found!";
                        }
                    }

                    // Display the array with highlights
                    foreach ($array as $index => $value) {
                        echo '<div class="array-box ' . $highlighted[$index] . '">' . $value . '</div>';
                    }
                    ?>
                </div>

                <form method="POST" class="text-center mb-3">
                    <input type="number" name="target" placeholder="Enter target value" required>
                    <button type="submit" class="btn btn-primary">Start Search</button>
                </form>

                <div id="result-message" class="text-center mt-3">
                    <p class="text-success"><?php echo $resultMessage; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>