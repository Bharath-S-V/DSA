<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSA in PHP with Bootstrap</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <h5>Explanation:</h5>
                <p>
                    <strong>Bubble Sort</strong> is a simple sorting algorithm that repeatedly steps through the list, compares adjacent elements, and swaps them if they are in the wrong order.
                    The pass through the list is repeated until the list is sorted.
                </p>
                <ul>
                    <li>We loop through the array <code>n</code> times, where <code>n</code> is the number of elements in the array.</li>
                    <li>In each pass, we compare adjacent elements and swap them if they are in the wrong order (i.e., the first element is larger than the second).</li>
                    <li>With each pass, the largest unsorted element "bubbles" to the correct position.</li>
                    <li>The process repeats until the array is fully sorted.</li>
                </ul>
            </div>
        </div>


        <!-- Binary Search Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>2. Binary Search</h2>
            </div>
            <div class="card-body">
                <?php
                function binarySearch($arr, $x)
                {
                    $low = 0;
                    $high = count($arr) - 1;

                    while ($low <= $high) {
                        $mid = floor(($low + $high) / 2);
                        if ($arr[$mid] == $x) {
                            return $mid;
                        }
                        if ($arr[$mid] < $x) {
                            $low = $mid + 1;
                        } else {
                            $high = $mid - 1;
                        }
                    }
                    return -1;
                }

                $arr = [2, 3, 4, 10, 40];
                $x = 10;
                $result = binarySearch($arr, $x);

                if ($result == -1) {
                    echo "<p class='text-danger'>Element not found!</p>";
                } else {
                    echo "<p class='text-success'>Element found at index " . $result . "</p>";
                }
                ?>
            </div>
        </div>

        <!-- Linked List Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>3. Linked List (Singly Linked List)</h2>
            </div>
            <div class="card-body">
                <?php
                class Node
                {
                    public $data;
                    public $next;
                    public function __construct($data)
                    {
                        $this->data = $data;
                        $this->next = null;
                    }
                }

                class LinkedList
                {
                    private $head = null;

                    public function insert($data)
                    {
                        $newNode = new Node($data);
                        if ($this->head == null) {
                            $this->head = $newNode;
                        } else {
                            $current = $this->head;
                            while ($current->next != null) {
                                $current = $current->next;
                            }
                            $current->next = $newNode;
                        }
                    }

                    public function display()
                    {
                        $current = $this->head;
                        while ($current != null) {
                            echo $current->data . " -> ";
                            $current = $current->next;
                        }
                        echo "NULL";
                    }
                }

                $list = new LinkedList();
                $list->insert(10);
                $list->insert(20);
                $list->insert(30);
                echo "<pre>";
                $list->display();
                echo "</pre>";
                ?>
            </div>
        </div>

        <!-- Stack Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>4. Stack (LIFO)</h2>
            </div>
            <div class="card-body">
                <?php
                class Stack
                {
                    private $stack = [];

                    public function push($data)
                    {
                        array_push($this->stack, $data);
                    }

                    public function pop()
                    {
                        if (!$this->isEmpty()) {
                            return array_pop($this->stack);
                        } else {
                            return "Stack is empty!";
                        }
                    }

                    public function peek()
                    {
                        if (!$this->isEmpty()) {
                            return end($this->stack);
                        } else {
                            return "Stack is empty!";
                        }
                    }

                    public function isEmpty()
                    {
                        return empty($this->stack);
                    }
                }

                $stack = new Stack();
                $stack->push(10);
                $stack->push(20);
                echo "<p>Top element (peek): " . $stack->peek() . "</p>";
                echo "<p>Popped element: " . $stack->pop() . "</p>";
                echo "<p>Popped element: " . $stack->pop() . "</p>";
                echo "<p>Popped element: " . $stack->pop() . "</p>";
                ?>
            </div>
        </div>

        <!-- Queue Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>5. Queue (FIFO)</h2>
            </div>
            <div class="card-body">
                <?php
                class Queue
                {
                    private $queue = [];

                    public function enqueue($data)
                    {
                        array_push($this->queue, $data);
                    }

                    public function dequeue()
                    {
                        if (!$this->isEmpty()) {
                            return array_shift($this->queue);
                        } else {
                            return "Queue is empty!";
                        }
                    }

                    public function isEmpty()
                    {
                        return empty($this->queue);
                    }
                }

                $queue = new Queue();
                $queue->enqueue(10);
                $queue->enqueue(20);
                echo "<p>Dequeued element: " . $queue->dequeue() . "</p>";
                echo "<p>Dequeued element: " . $queue->dequeue() . "</p>";
                echo "<p>Dequeued element: " . $queue->dequeue() . "</p>";
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>