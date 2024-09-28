<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Singly Linked List Visualization</title>
    <!-- Bootstrap CSS for styling the page -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for visualizing the linked list */
        .linked-list {
            display: flex;
            align-items: center;
            animation: fadeIn 1s;
        }

        /* Each node in the linked list */
        .node {
            background-color: #f8f9fa;
            border: 2px solid #007bff;
            border-radius: 5px;
            padding: 10px 15px;
            margin: 5px;
            transition: transform 0.3s;
        }

        /* Scale the node on hover to create a zoom effect */
        .node:hover {
            transform: scale(1.1);
        }

        /* Arrow between nodes to indicate the link */
        .arrow {
            font-size: 24px;
            margin: 0 10px;
            animation: pulse 1s infinite;
        }

        /* Fade-in animation for smooth transition */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Pulse effect on arrows for a dynamic look */
        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <!-- The card layout to hold the content -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>Singly Linked List Visualization</h2>
            </div>
            <div class="card-body">
                <!-- Explanation of how a linked list works for the user to read -->
                <p>A <strong>singly linked list</strong> is a data structure where each element (called a node) contains data and a reference (or pointer) to the next node in the sequence. This is how the list is linked together. In this visualization, you can see how the nodes are connected, with each arrow indicating the link to the next node.</p>

                <!-- PHP code to define a Node and LinkedList classes -->
                <?php
                // Node class to create individual nodes for the linked list
                class Node
                {
                    public $data; // Data part of the node
                    public $next; // Pointer to the next node

                    // Constructor to initialize node with data
                    public function __construct($data)
                    {
                        $this->data = $data;
                        $this->next = null; // Next is null when node is created
                    }
                }

                // LinkedList class to manage the list operations
                class LinkedList
                {
                    private $head = null; // Head of the list (first node)

                    // Method to insert data into the linked list
                    public function insert($data)
                    {
                        $newNode = new Node($data); // Create a new node
                        if ($this->head == null) {
                            // If the list is empty, the new node becomes the head
                            $this->head = $newNode;
                        } else {
                            // Otherwise, traverse to the end and add the new node
                            $current = $this->head;
                            while ($current->next != null) {
                                $current = $current->next;
                            }
                            $current->next = $newNode;
                        }
                    }

                    // Method to display the linked list as a series of nodes
                    public function display()
                    {
                        $current = $this->head;
                        $output = ""; // HTML to display the nodes

                        // Traverse the linked list and build the output
                        while ($current != null) {
                            // Display the current node's data
                            $output .= "<div class='node'>{$current->data}</div>";
                            if ($current->next != null) {
                                // If there is a next node, display an arrow
                                $output .= "<div class='arrow'>→</div>";
                            }
                            $current = $current->next; // Move to the next node
                        }
                        return $output;
                    }
                }

                // Create a new LinkedList instance and insert some data
                $list = new LinkedList();
                $list->insert(10);
                $list->insert(20);
                $list->insert(30);
                ?>

                <!-- Visualize the linked list dynamically -->
                <div class="linked-list">
                    <!-- This PHP code outputs the linked list nodes and arrows -->
                    <?= $list->display(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>