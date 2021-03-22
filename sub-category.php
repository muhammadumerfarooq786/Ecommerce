<?php
session_start();
error_reporting(0);
include('includes/config.php');
$cid=intval($_GET['scid']);
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
								echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
		}else{
			$message="Product ID is invalid";
		}
	}
}

if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','".$_GET['pid']."')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:my-wishlist.php');

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

    <title>Product Category</title>

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
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row outer-bottom-sm'>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">
                    <?php include('includes/side-menu.php');?>
                    <?php include('includes/side-subcategory.php');?>
                    <div class="sidebar-filter">
                        </div>
                    </div>
                </div>
                <div class='col-md-9'>
                    <div class="search-result-container">
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product  inner-top-vs">
                                    <div class="row">
                                        <?php
$ret=mysqli_query($con,"select * from products where subCategory='$cid'");
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret)) 
{?>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a
                                                                href="product-details.php?pid=<?php echo ($row['id']);?>"><img
                                                                    src="<?php echo ($row['productImage1']);?>"
                                                                    alt="" width="200" height="300"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a
                                                                href="product-details.php?pid=<?php echo ($row['id']);?>"><?php echo ($row['productName']);?></a>
                                                        </h3>
                                                        <?php include('includes/rating.php');?>
                                                        <div class="description"></div>

                                                        <div class="product-price">
                                                            <span class="price">
                                                                Rs. <?php echo ($row['productPrice']);?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <?php if($row['productAvailability']=='In Stock'){?>
                                                                    <a
                                                                        href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>">
                                                                        <button class="btn btn-primary"
                                                                            type="button">Add to cart</button></a>
                                                                    <?php } else {?>
                                                                    <div class="action" style="color:red">Out of Stock
                                                                    </div>
                                                                    <?php } ?>
                                                                </li>
                                                                <li class="lnk wishlist">
                                                                    <a class="add-to-cart"
                                                                        href="category.php?pid=<?php echo ($row['id'])?>&&action=wishlist"
                                                                        title="Wishlist">
                                                                        <i class="icon fa fa-heart"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } } else {?>
                                        <div class="col-sm-6 col-md-4">
                                            <h3>No Product Found</h3>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
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