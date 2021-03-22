<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:.php');
}
else{
	if(isset($_POST['update']))
	{
		$baddress=$_POST['billingaddress'];
		$bstate=$_POST['bilingstate'];
		$bcity=$_POST['billingcity'];
		$bpincode=$_POST['billingpincode'];
		$query=mysqli_query($con,"update users set billingAddress='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Billing Address has been updated');</script>";
		}
	}


	if(isset($_POST['shipupdate']))
	{
		$saddress=$_POST['shippingaddress'];
		$sstate=$_POST['shippingstate'];
		$scity=$_POST['shippingcity'];
		$spincode=$_POST['shippingpincode'];
		$query=mysqli_query($con,"update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Shipping Address has been updated');</script>";
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

    <title>My Account</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/green.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">

    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
</head>

<body class="cnt-home">
    <header class="header-style-1">
        <?php include('includes/header.php');?>
    </header>
    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="checkout-box inner-bottom-sm">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <div class="panel panel-default checkout-step-01">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                            <span>1</span>Billing Address
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 already-registered-login">

                                                <?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>
                                                <form class="register-form" role="form" method="post">
                                                    <div class="form-group">
                                                        <label class="info-title" for="Billing Address">Billing
                                                            Address<span>*</span></label>
                                                        <textarea class="form-control unicase-form-control text-input"
                                                            name="billingaddress"
                                                            required="required"><?php echo $row['billingAddress'];?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="Billing State ">Billing State
                                                            <span>*</span></label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="bilingstate" name="bilingstate"
                                                            value="<?php echo $row['billingState'];?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="Billing City">Billing City
                                                            <span>*</span></label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="billingcity" name="billingcity" required="required"
                                                            value="<?php echo $row['billingCity'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="Billing Pincode">Billing Pincode
                                                            <span>*</span></label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="billingpincode" name="billingpincode"
                                                            required="required"
                                                            value="<?php echo $row['billingPincode'];?>">
                                                    </div>

                                                    <button type="submit" name="update"
                                                        class="btn-upper btn btn-primary checkout-page-button">Update</button>
                                                </form>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default checkout-step-02">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion"
                                            href="#collapseTwo">
                                            <span>2</span>Shipping Address
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{?>
                                        <form class="register-form" role="form" method="post">
                                            <div class="form-group">
                                                <label class="info-title" for="Shipping Address">Shipping
                                                    Address<span>*</span></label>
                                                <textarea class="form-control unicase-form-control text-input" " name="
                                                    shippingaddress"
                                                    required="required"><?php echo $row['shippingAddress'];?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="Billing State ">Shipping State
                                                    <span>*</span></label>
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    id="shippingstate" name="shippingstate"
                                                    value="<?php echo $row['shippingState'];?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="Billing City">Shipping City
                                                    <span>*</span></label>
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    id="shippingcity" name="shippingcity" required="required"
                                                    value="<?php echo $row['shippingCity'];?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="Billing Pincode">Shipping Pincode
                                                    <span>*</span></label>
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    id="shippingpincode" name="shippingpincode" required="required"
                                                    value="<?php echo $row['shippingPincode'];?>">
                                            </div>
                                            <button type="submit" name="shipupdate"
                                                class="btn-upper btn btn-primary checkout-page-button">Update</button>
                                        </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include('includes/myaccount-sidebar.php');?>
                </div>
            </div>

        </div>
    </div>
    <?php include('includes/footer.php');?>

    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
</body>

</html>
<?php } ?>