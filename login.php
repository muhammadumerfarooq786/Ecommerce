<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
    if(isset($_POST['submit']))
    {
        $name=$_POST['fullname'];
        $email=$_POST['emailid'];
        $password=md5($_POST['password']);
        $query=mysqli_query($con,"insert into users(name,email,password) values('$name','$email','$password')");
        if($query)
        {
            echo "<script>alert('Successfully registered');</script>";
        }
        else{
            echo "<script>alert('Error occured while registering');</script>";
        }
    }

    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and password='$password'");
        $num=mysqli_fetch_array($query);
        if($num>0)
        {
            $_SESSION['login']=$_POST['email'];
            $_SESSION['id']=$num['id'];
            $_SESSION['username']=$num['name'];
            header("location:index.php");
            exit();
        }
        else
        {
            header("location:login.php");
            $_SESSION['errmsg']="Invalid email id or Password";
            exit();
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>Atec Mert Login</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

    <script src="https://kit.fontawesome.com/d34e22b7c9.js" crossorigin="anonymous"></script>

    <script type="text/javascript">
    function userAvailability() {
        jQuery.ajax({
            url: "email_availability.php",
            data: 'email=' + $("#email").val(),
            type: "POST",
            success: function(data) {
                $("#email-availability").html(data);
            },
            error: function() {}
        });
    }
    </script>
</head>
<style>
    input[type="text"],input[type="email"],input[type="password"]{
        background-color: #e0dbdb;
    }
</style>

<body class="cnt-home">
    <header class="header-style-1">
        <?php include('includes/header.php');?>

    </header>

    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="sign-in-page inner-bottom-sm">
                <div class="row">
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Sign in</h4>
                        <form class="register-form outer-top-xs" method="post">
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input"
                                    id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" name="password"
                                    class="form-control unicase-form-control text-input" id="exampleInputPassword1">
                            </div>
                            <div class="">
                                <p style="color: red; font-size: 12px"><?php echo $_SESSION['errmsg']?></p>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button"
                                name="login">Login</button>
                        </form>
                    </div>

                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">create new account</h4>
                        <form class="register-form outer-top-xs" role="form" method="post" name="register"
                            onSubmit="return ">
                            <div class="form-group">
                                <label class="info-title" for="fullname">Full Name <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="fullname"
                                    name="fullname" required="required">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" id="email"
                                    onBlur="userAvailability()" name="emailid" required>
                                <span id="email-availability" style="font-size:12px;"></span>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">Password. <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input"
                                    id="password" name="password" required>
                            </div>
                            <button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button"
                                id="submit">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php');?>

    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>