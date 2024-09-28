<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queue (FIFO) Visualization</title>
    <!-- Bootstrap CSS for layout -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling the queue container */
        .queue-container {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            height: 100px;
            width: 100%;
            overflow: hidden;
            margin: 20px auto;
            border: 2px solid #28a745;
            border-radius: 5px;
            padding: 10px;
            position: relative;
        }

        /* Queue element styles */
        .queue-element {
            background-color: #f8f9fa;
            border: 2px solid #28a745;
            border-radius: 5px;
            width: 80px;
            text-align: center;
            padding: 10px;
            margin: 0 5px;
            opacity: 1;
            transition: transform 0.5s, opacity 0.5s;
        }

        /* Enqueue animation */
        .queue-element.new {
            opacity: 0;
            transform: translateX(-100%);
        }

        /* Dequeue animation */
        .queue-element.removed {
            opacity: 0;
            transform: translateX(100%);
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
        <!-- Queue visualization card -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>Queue (FIFO) Visualization</h2>
            </div>
            <div class="card-body">
                <!-- Queue Container for visual representation -->
                <div id="queueContainer" class="queue-container">
                    <!-- Queue elements will be added dynamically here via PHP -->
                    <?php
                    session_start();
                    if (!isset($_SESSION['queue'])) {
                        $_SESSION['queue'] = [];
                    }

                    // Handle enqueue operation
                    if (isset($_POST['enqueue'])) {
                        if (!empty($_POST['inputValue'])) {
                            array_push($_SESSION['queue'], $_POST['inputValue']);
                        }
                    }

                    // Handle dequeue operation
                    if (isset($_POST['dequeue'])) {
                        if (!empty($_SESSION['queue'])) {
                            array_shift($_SESSION['queue']);
                        } else {
                            echo "<p class='text-danger'>Queue is empty!</p>";
                        }
                    }

                    // Display queue elements
                    foreach ($_SESSION['queue'] as $element) {
                        echo "<div class='queue-element'>" . htmlspecialchars($element) . "</div>";
                    }
                    ?>
                </div>

                <!-- Button group for queue operations -->
                <form method="POST" class="btn-group">
                    <input type="number" name="inputValue" placeholder="Enter value" class="form-control">
                    <button type="submit" name="enqueue" class="btn btn-success">Enqueue</button>
                    <button type="submit" name="dequeue" class="btn btn-warning">Dequeue</button>
                </form>

                <!-- Display results of queue operations -->
                <div id="result" class="mt-3"></div>
            </div>
        </div>
    </div>

    <!-- Optional Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript for queue animations -->
    <script>
        // Enqueue animation
        const queueContainer = document.getElementById('queueContainer');
        const newQueueElement = document.querySelectorAll('.queue-element.new');

        // Animate the new elements added to the queue
        setTimeout(() => {
            newQueueElement.forEach((element) => {
                element.classList.remove('new');
            });
        }, 100);

        // Dequeue animation
        const dequeueButton = document.querySelector("[name='dequeue']");
        dequeueButton.addEventListener('click', function() {
            const firstElement = queueContainer.firstElementChild;
            if (firstElement) {
                firstElement.classList.add('removed');
                setTimeout(() => {
                    firstElement.remove();
                }, 500);
            }
        });
    </script>
</body>

</html>