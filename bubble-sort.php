<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSA in PHP with Bootstrap and Animation</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for Animation -->
    <style>
        .sorting-box {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .sorting-box div {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8d7da;
            font-size: 1.5rem;
            border: 2px solid #721c24;
            border-radius: 5px;
            animation: highlight 2s infinite;
        }

        @keyframes highlight {

            0%,
            100% {
                background-color: #f8d7da;
            }

            50% {
                background-color: #c3e6cb;
            }
        }

        .highlighted {
            background-color: #ffeeba;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-5">PHP Data Structures and Algorithms</h1>

        <!-- Bubble Sort Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>1. Array Sorting (Bubble Sort)</h2>
            </div>
            <div class="card-body">
                <!-- Explanation Section -->
                <h5>Explanation:</h5>
                <p>Bubble Sort is a simple sorting algorithm that compares adjacent elements and swaps them if they are in the wrong order. This process continues until the array is sorted.</p>

                <ul>
                    <li>Step 1: Start from the first element and compare it with the adjacent element.</li>
                    <li>Step 2: If the first element is larger than the adjacent, swap them.</li>
                    <li>Step 3: Move to the next element and repeat until the array is sorted.</li>
                </ul>

                <!-- Animation of the array -->
                <h5>Array Animation:</h5>
                <div class="sorting-box" id="sorting-array">
                    <div>64</div>
                    <div>34</div>
                    <div>25</div>
                    <div>12</div>
                    <div>22</div>
                    <div>11</div>
                    <div>90</div>
                </div>

                <button class="btn btn-primary mt-3" onclick="animateSort()">Start Bubble Sort Animation</button>

                <!-- PHP Bubble Sort -->
                <h5 class="mt-4">Sorted Array:</h5>
                <?php
                function bubbleSort(&$arr)
                {
                    $n = count($arr);
                    for ($i = 0; $i < $n; $i++) {
                        for ($j = 0; $j < $n - $i - 1; $j++) {
                            if ($arr[$j] > $arr[$j + 1]) {
                                $temp = $arr[$j];
                                $arr[$j] = $arr[$j + 1];
                                $arr[$j + 1] = $temp;
                            }
                        }
                    }
                }

                $arr = [64, 34, 25, 12, 22, 11, 90];
                bubbleSort($arr);
                echo '<pre>';
                print_r($arr);
                echo '</pre>';
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript for Sorting Animation -->
    <script>
        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        async function animateSort() {
            const arr = [64, 34, 25, 12, 22, 11, 90];
            const elements = document.querySelectorAll("#sorting-array div");

            for (let i = 0; i < arr.length; i++) {
                for (let j = 0; j < arr.length - i - 1; j++) {
                    elements[j].classList.add("highlighted");
                    elements[j + 1].classList.add("highlighted");

                    await sleep(1000); // Wait 1 second for visualization

                    if (arr[j] > arr[j + 1]) {
                        // Swap in JavaScript
                        [arr[j], arr[j + 1]] = [arr[j + 1], arr[j]];

                        // Update the UI to reflect the swap
                        elements[j].textContent = arr[j];
                        elements[j + 1].textContent = arr[j + 1];
                    }

                    elements[j].classList.remove("highlighted");
                    elements[j + 1].classList.remove("highlighted");
                }
            }
        }
    </script>
</body>

</html>