<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Responsive Navbar with Animation</title>

    <!-- Bootstrap CSS (CDN link) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS for Styling and Advanced Animations -->
    <style>
        /* Global styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Navbar Background with Gradient */
        .navbar {
            background: linear-gradient(45deg, #007bff, #6f42c1);
            transition: background 0.6s ease-in-out, padding 0.6s ease-in-out;
            padding: 1rem;
        }

        /* Navbar Brand Styling */
        .navbar-brand {
            font-weight: bold;
            font-size: 1.7rem;
            color: #fff;
            letter-spacing: 1px;
            transition: color 0.3s ease, transform 0.4s ease;
        }

        .navbar-brand:hover {
            color: #ffdf00;
            transform: scale(1.1);
        }

        /* Navbar Links */
        .nav-link {
            color: #fff !important;
            font-size: 1.2rem;
            letter-spacing: 0.5px;
            transition: all 0.4s ease, transform 0.4s ease;
            position: relative;
        }

        /* Add a line on hover */
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            bottom: -5px;
            left: 0;
            background-color: #ffdf00;
            transition: width 0.4s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Navbar Links Hover Effects */
        .nav-link:hover {
            color: #ffdf00 !important;
            transform: translateY(-3px);
        }

        /* Dropdown Menu Styling with Fade-In Animation */
        .dropdown-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.4s ease-in-out;
            background-color: rgba(0, 0, 0, 0.85);
        }

        /* Dropdown on Hover */
        .nav-item.dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0px);
        }

        /* Dropdown Item Hover Effect */
        .dropdown-item {
            transition: all 0.4s ease;
            color: #fff;
        }

        .dropdown-item:hover {
            background-color: #ffdf00;
            color: #000;
        }

        /* Toggler Icon Styling */
        .navbar-toggler {
            border: 2px solid #fff;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%28255,255,255,1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        /* Background Animation on Scroll */
        .scrolled-navbar {
            background: linear-gradient(45deg, #6f42c1, #007bff) !important;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.3);
            padding: 0.5rem;
        }

        /* Button Animation (for future use in dropdown items) */
        .btn-animated {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 0.7rem 1.2rem;
            font-size: 1rem;
            border-radius: 30px;
            transition: all 0.5s ease-in-out;
        }

        .btn-animated:hover {
            background-color: #ffdf00;
            color: black;
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Smooth scrolling to anchor links */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>

    <!-- Responsive Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyWebsite</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">array</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Stack</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Queue</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            A
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another Action</a></li>
                            <li><a class="dropdown-item" href="#">Something Else Here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another Action</a></li>
                            <li><a class="dropdown-item" href="#">Something Else Here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another Action</a></li>
                            <li><a class="dropdown-item" href="#">Something Else Here</a></li>
                        </ul>
                    </li>
                    <!-- Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another Action</a></li>
                            <li><a class="dropdown-item" href="#">Something Else Here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS (CDN link) and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

    <!-- JavaScript for Navbar Background Change on Scroll -->
    <script>
        window.onscroll = function() {
            var navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled-navbar');
            } else {
                navbar.classList.remove('scrolled-navbar');
            }
        };
    </script>
</body>

</html>