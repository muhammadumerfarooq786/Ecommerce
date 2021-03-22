<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <title>About Us</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

    <script src="https://kit.fontawesome.com/d34e22b7c9.js" crossorigin="anonymous"></script>
</head>
<style>
    .aboutus_logo {
        font-size: 200px;
        margin: 20px auto;
        color: #f44336;
    }

    .aboutus_row {
        margin: 50px;
    }

    .aboutus_row h2{
        margin: 20px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }
    .aboutus_row
    h4,.aboutus_button {
        margin: 20px;
        letter-spacing: 0.5px;
    }
    .about-para{
        margin: 20px;
    }

    @media (max-width: 767px) {
        .aboutus_logo {
            font-size: 100px;
            margin: 10% 28%;
        }

        .aboutus_row {
            margin: 20px;
        }
        .aboutus_row h2{
            margin: 30px
        }
        .aboutus_row
        h4,.aboutus_button {
            margin: 10px;
        }
    }
</style>

<body>
    <header class="header-style-1">
        <?php include('includes/header.php');?>
    </header>
    <div class='container'>
        <div class="row aboutus_row">
            <div class="col-sm-8">
                <h2>About AtecMart</h2>
                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.</h4>
                <p class="about-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                    officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <button class="btn btn-primary btn-lg aboutus_button">
                    <a href="contact.php" style="color: white">Get in Touch</a>
                </button>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-signal aboutus_logo"></span>
            </div>
        </div>
        <div class="row aboutus_row">
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-globe aboutus_logo"></span>
            </div>
            <div class="col-sm-8">
                <h2>Our Values</h2>
                <p class="about-para"><strong>Mission: </strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.</p>
                <p class="about-para"><strong>VISION:</strong> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
            </div>
        </div>
    </div>
    </div>
    <footer>
        <?php include('includes/footer.php');?>
    </footer>

    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>