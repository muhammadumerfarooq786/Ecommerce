<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{

    $wid=intval($_GET['del']);
if(isset($_GET['del']))
{
$query=mysqli_query($con,"delete from wishlist where id='$wid'");
}

if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	$query=mysqli_query($con,"delete from wishlist where productId='$id'");
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);	
header('location:my-wishlist.php');
}
		else{
			$message="Product ID is invalid";
		}
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

    <title>Wishlist</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

    <script src="https://kit.fontawesome.com/d34e22b7c9.js" crossorigin="anonymous"></script>
</head>
<body class="cnt-home">
    <header class="header-style-1">
        <?php include('includes/header.php');?>
    </header>
    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="my-wishlist-page inner-bottom-sm">
                <div class="row">
                    <div class="col-md-12 my-wishlist">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="4">Wishlist</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$ret=mysqli_query($con,"select products.productName as pname,products.productName as proid,products.productImage1 as pimage,products.productPrice as pprice,wishlist.productId as pid,wishlist.id as wid from wishlist join products on products.id=wishlist.productId where wishlist.userId='".$_SESSION['id']."'");
$num=mysqli_num_rows($ret);
	if($num>0)
	{
while ($row=mysqli_fetch_array($ret)) {?>
                                    <tr>
                                        <td class="col-md-2">
                                            <img src="<?php echo ($row['pimage']);?>"
                                                alt="<?php echo ($row['pname']);?>" width="60" height="100">
                                        </td>
                                        <td class="col-md-6">
                                            <div class="product-name"><a
                                                    href="product-details.php?pid=<?php echo ($pd=$row['pid']);?>"><?php echo ($row['pname']);?></a>
                                            </div>
                                            <?php $rt=mysqli_query($con,"select * from productreviews where productId='$pd'");
$num=mysqli_num_rows($rt);{?>
                                            <?php include('includes/rating.php');?>
                                            <?php } ?>
                                            <div class="price">Rs.
                                                <?php echo ($row['pprice']);?>.00
                                                <span>$900.00</span>
                                            </div>
                                        </td>
                                        <td class="col-md-2">
                                            <a href="my-wishlist.php?page=product&action=add&id=<?php echo $row['pid']; ?>"
                                                class="btn-upper btn btn-primary">Add to cart</a>
                                        </td>
                                        <td class="col-md-2 close-btn">
                                            <a href="my-wishlist.php?del=<?php echo ($row['wid']);?>"
                                                onClick="return" class=""><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <?php } } else{ ?>
                                    <tr>
                                        <td style="font-size: 18px; font-weight:bold ">Your Wishlist is Empty</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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
<?php } ?>