<?php
session_start();
// Include the database connection
include("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Homepage</title>
    <link rel="stylesheet" href="user_homepage.css">
    <style>
        body {
            background-image: url('images/homepage3.jpg'); 
            background-image: url('images/homepage7.jpg');/* Background image from uploads folder */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
<h1 class="centered-heading">Welcome To Our Programs!</h1>

<style>
    .centered-heading {
        text-align: center;
        color: blue;
        font-size: 5vw; /* Responsive font size */
        margin-top: 20px;
    }
</style>


    <!-- Hamburger Menu Icon -->
    <div class="hamburger-menu" onclick="toggleMenu(event)">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>

    <!-- Logout Button -->
    <a href="user_logout.php" class="logout-button">Logout</a>

    <!-- Sidebar Navigation (Hamburger Menu) -->
    <div id="sidebar" class="sidebar">
        <ul class="menu-list">
            <li><a href="user_logout.php">Logout</a></li>
           <!-- <li><a href="academics.php">Academics</a></li> <!-- New Academics Link -->
            <li><a href="student_enroll.php">Enroll Units</a></li> <!-- Enroll Button Link -->
            <li><a href="student_dashboard.php">Results Toggle</a></li>
            <li><a href="view_resources_lib.php?category=A">View Resources</a></li> <!-- Integrated View Resources Link -->
            <li><a href="student_homepage.php">Available Assignments</a></li> <!-- Integrated student_homepage.php -->
            <li><a href="submit_solution.php">Submit Solution</a></li> <!-- Integrated submit_solution.php -->
           <!-- <li><a href="student_files9.php">STUDENT COMMUNITY</a></li> -->
           <li><a href="animation.html">Chat</a></li>
           <li><a href="student_reviews.php">Rate Course</a></li>
          <!-- <li><a href="animation.html">Chat</a></li> -->
        </ul>
    </div>

    <!-- Content Section -->
    <div class="content">
        <div class="welcome-container">
            <p class="welcome-message">
            <div class="profile-avatar"></div>
            🌍 WELCOME BACK TO ONLINE LEARNING PLATFORM 👋
                <?php 
                // Check if the user is logged in using session
                if (isset($_SESSION['email'])) {
                    $email = $_SESSION['email'];
                    // Retrieve the user's information based on their email
                    $query = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'");
                    
                    // Display the user's full name
                    if ($query && mysqli_num_rows($query) > 0) {
                        $row = mysqli_fetch_assoc($query);
                        echo htmlspecialchars($row['firstName'] . ' ' . $row['lastName']);
                    } else {
                        echo "Guest";
                    }
                }
                ?>
                :)
            </p>
        </div>
    </div>

    <script>
        function toggleMenu(event) {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("active");
            event.stopPropagation(); // Prevent the event from propagating to the document listener
        }

        // Close the sidebar when clicking outside of it
        document.addEventListener("click", function (event) {
            const sidebar = document.getElementById("sidebar");
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isHamburgerMenu = event.target.closest('.hamburger-menu');

            if (!isClickInsideSidebar && !isHamburgerMenu && sidebar.classList.contains("active")) {
                sidebar.classList.remove("active");
            }
        });
    </script>
</body>
</html>
