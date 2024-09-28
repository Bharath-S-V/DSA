<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stack (LIFO) Visualization</title>
    <!-- Bootstrap CSS for layout -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling the stack container */
        .stack-container {
            display: flex;
            flex-direction: column-reverse;
            /* Stack elements from bottom to top */
            align-items: center;
            height: 200px;
            justify-content: flex-start;
            position: relative;
            width: 100px;
            margin: 20px auto;
            border: 2px solid #007bff;
            border-radius: 5px;
            padding: 10px;
        }

        /* Stack element styles */
        .stack-element {
            background-color: #f8f9fa;
            border: 2px solid #007bff;
            border-radius: 5px;
            width: 80px;
            text-align: center;
            padding: 10px;
            margin: 5px 0;
        }

        /* Button styles */
        .btn-group {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .btn {
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <!-- Stack visualization card -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>Stack (LIFO) Visualization</h2>
            </div>
            <div class="card-body">
                <!-- Stack Container for visual representation -->
                <div id="stackContainer" class="stack-container">
                    <!-- Stack elements will be displayed here via PHP -->
                    <?php
                    session_start();
                    if (!isset($_SESSION['stack'])) {
                        $_SESSION['stack'] = [];
                    }

                    // Handle push operation
                    if (isset($_POST['push'])) {
                        if (!empty($_POST['inputValue'])) {
                            array_push($_SESSION['stack'], $_POST['inputValue']);
                        }
                    }

                    // Handle pop operation
                    if (isset($_POST['pop'])) {
                        if (!empty($_SESSION['stack'])) {
                            array_pop($_SESSION['stack']);
                        } else {
                            echo "<p class='text-danger'>Stack is empty!</p>";
                        }
                    }

                    // Display stack elements
                    foreach (array_reverse($_SESSION['stack']) as $element) {
                        echo "<div class='stack-element'>" . htmlspecialchars($element) . "</div>";
                    }
                    ?>
                </div>

                <!-- Button group for stack operations -->
                <form method="POST" class="btn-group">
                    <input type="number" name="inputValue" placeholder="Enter value" class="form-control">
                    <button type="submit" name="push" class="btn btn-primary">Push</button>
                    <button type="submit" name="pop" class="btn btn-danger">Pop</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>