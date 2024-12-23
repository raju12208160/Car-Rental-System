<?php
session_start();
require '../config/connection.php';
$conn = Connect();
?>

<!DOCTYPE html>
<html>

<head>


    <title>Customer Registration</title>
    <link rel="stylesheet" href="../css/customer_registration.css">

    <script>
        function validateForm() {
            var name = document.forms["loginForm"]["name"].value;
            var mobile = document.forms["loginForm"]["mobile"].value;
            var address = document.forms["loginForm"]["address"].value;
            var phone = document.forms["loginForm"]["phone"].value;
            var password = document.forms["loginForm"]["password"].value;
            var email = document.forms["loginForm"]["email"].value;

            // Mobile number validation (10 digits)
            if (mobile === "" || isNaN(mobile) || mobile.length !== 10) {
                alert("Mobile number must be a 10-digit numeric value");
                return false;
            }

            // Password validation (strong password)
            var passwordPattern = /^(?=.*\d)(?=.*[a-zA-Z])(?=.*[@#$%^&+=]).{8,}$/;
            if (password === "" || !password.match(passwordPattern)) {
                alert("Password must be at least 8 characters long and include a combination of letters, numbers, and special characters (@#$%^&+=)");
                return false;
            }

            // Email validation (basic format)
            var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (email === "" || !email.match(emailPattern)) {
                alert("Please enter a valid email address");
                return false;
            }

            if (name === "") {
                alert("Name must be filled out");
                return false;
            }
            if (address === "") {
                alert("Address must be filled out");
                return false;
            }
            if (phone === "") {
                alert("Phone number must be filled out");
                return false;
            }
        }
    </script>
</head>

<body>
<header>
        <h1 style="color:#fff;">Car Rental System</h1>
        <p style="color:#fff;">"Experience the freedom of the open road with our reliable car rental service. Choose from our wide selection of vehicles and enjoy a smooth, stress-free journey."</p>

    </header>
    <?php
    if (isset($_SESSION['login_agency'])) {
    ?>
        <nav>
            <ul>
                <li><a class="nav-bar" href="../agency/index.php">Home</a></li>
                <li><a class="nav-bar"  href="#">Welcome <?php echo $_SESSION['login_agency']; ?></a></li>

                        <li><a class="nav-bar"  href="../agency/addcar.php">Add Car</a></li>
                        <li><a class="nav-bar"  href="../agency/agencyview.php">View Booked Cars</a></li>

                <li><a class="nav-bar"  href="../home/about.php">About US</a></li>
                <li><a class="nav-bar"  href="../config/logout.php">Logout</a></li>
            </ul>
        </nav>
    <?php
    } else if (isset($_SESSION['login_customer'])) {
    ?>
<nav>
                <ul>
                <li><a class="nav-bar"  href="../home/index.php">Home</a></li>
                <li><a class="nav-bar"  href="#">Welcome <?php echo $_SESSION['login_customer']; ?></a></li>

                        <li><a class="nav-bar"  href="../customer/prereturncar.php">Return Now</a></li>
                        <li><a class="nav-bar"  href="../customer/mybookings.php"> My Bookings</a></li>

                <li><a class="nav-bar"  href="../home/about.php">About US</a></li>
                <li><a class="nav-bar"  href="../config/logout.php">Logout</a></li>


            </ul>
    </nav>
    <?php
    } else {
    ?>
        <nav>
            <ul>
                <li><a class="nav-bar"  href="../home/index.php">Home</a></li>
                <li><a class="nav-bar"  href="../agency/agency_login.php">Agency Login</a></li>
                <li><a class="nav-bar"  href="customer_login.php">Customer Login</a></li>
                <li><a class="nav-bar"  href="../home/about.php">About US</a></li>
            </ul>
        </nav>
    <?php
    }
    ?>

        <h1>Customer Registration</h1>
    <form name="loginForm" action="process_registration_customer.php" onsubmit="return validateForm()" method="post">
        <label for="customer_username">UserName:</label>
        <input type="text" name="customer_username" id="customer_username" required><br><br>
        <label for="customer_mobile">Mobile Number (10 digits):</label>
        <input type="text" name="customer_mobile" id="customer_mobile" required><br><br>
        <label for="customer_address">Address:</label>
        <input type="text" name="customer_address" id="customer_address" required><br><br>
        <label for="customer_password">Password (at least 8 characters, letters, numbers, and special characters):</label>
        <input type="password" name="customer_password" id="customer_password" required><br><br>
        <label for="customer_email">Email (e.g., example@example.com):</label>
        <input type="email" name="customer_email" id="customer_email" required><br><br>
        <input type="submit" value="Sign Up">

        <p>Already have an account? <span><a href="customer_login.php">Login</a></span></p>
    </form>

    <footer>

        <div>
            <ul>
                <li><a class="footer" href="contact.php">Contact Us</a></li>
                <li><a class="footer" href="blog.php">Blog</a></li>
            </ul>
        </div>
        <div>
            <ul class="social-media">
                <li ><a href="https://www.facebook.com/">Facebook<i class="fab fa-facebook"></i></a>
                </li>
                <li><a href="https://x.com/">X<i class="fab fa-twitter"></i></a></li>
                <li><a href="https://www.instagram.com/">Instagram<i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
        <div>
            <p class="copyright" style="color:#fff;">&copy;
                <?php echo date("Y"); ?> Car rental System
            </p>
        </div>
    </footer>
</body>

</html>
