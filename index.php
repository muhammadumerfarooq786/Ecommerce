<?php
session_start();
error_reporting(0);
include('includes/config.php');
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
		}else{
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

    <title>Atec Mart</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <link rel="stylesheet" href="assets/css/owl.theme.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

    <script src="https://kit.fontawesome.com/d34e22b7c9.js" crossorigin="anonymous"></script>
</head>

<body class="cnt-home">
    <header class="header-style-1">
        <?php include('includes/header.php');?>
    </header>
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="furniture-container homepage-container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                        <?php include('includes/side-menu.php');?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                        <div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  ">
                            <div class="more-info-tab clearfix">
                                <h3 class="new-product-title pull-left">Trending Products</h3>
                            </div>
                            <div class="tab-content outer-top-xs">
                                <div class="tab-pane in active" id="all">
                                    <div class="product-slider">
                                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme"
                                            data-item="3">
                                            <?php
$ret=mysqli_query($con,"select * from products");
while ($row=mysqli_fetch_array($ret)) 
{?>
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a
                                                                    href="product-details.php?pid=<?php echo ($row['id']);?>">
                                                                    <img src="<?php echo ($row['productImage1']);?>"
                                                                        width="220" height="300" alt=""></a>
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
                                                                    Rs.<?php echo ($row['productPrice']);?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <?php if($row['productAvailability']=='In Stock'){?>
                                                        <div class="action"><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="icon-button btn btn-primary"><span><i
                                                                        class="glyphicon glyphicon-shopping-cart"></i></span></a>
                                                            <a class="icon-button btn btn-primary" data-toggle="tooltip"
                                                                data-placement="right" title="Wishlist"
                                                                href="product-details.php?pid=<?php echo ($row['id'])?>&&action=wishlist">
                                                                <i class="fa fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="action" style="color:red">Out of Stock</div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="books">
                                    <div class="product-slider">
                                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                            <?php
$ret=mysqli_query($con,"select * from products where category=3");
while ($row=mysqli_fetch_array($ret)) 
{?>
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a
                                                                    href="product-details.php?pid=<?php echo ($row['id']);?>">
                                                                    <img src="<?php echo ($row['productImage1']);?>"
                                                                        width="220" height="300" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a
                                                                    href="product-details.php?pid=<?php echo ($row['id']);?>"><?php echo ($row['productName']);?></a>
                                                            </h3>
                                                            <?php include('includes/rating.php');?>
                                                            <div class="product-price">
                                                                <span class="price">
                                                                    Rs. <?php echo ($row['productPrice']);?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <?php if($row['productAvailability']=='In Stock'){?>
                                                        <div class="action"><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="icon-button  btn btn-primary">Add to Cart</a></div>
                                                        <?php } else {?>
                                                        <div class="action">Out of Stock</div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="furniture">
                                    <div class="product-slider">
                                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                            <?php $ret=mysqli_query($con,"select * from products where category=5");
while ($row=mysqli_fetch_array($ret)) {?>
                                            <div class="item item-carousel">
                                                <div class="products">

                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a
                                                                    href="product-details.php?pid=<?php echo ($row['id']);?>">
                                                                    <img src="<?php echo ($row['productImage1']);?>"
                                                                        width="220" height="300" alt=""></a>
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
                                                                    Rs.<?php echo ($row['productPrice']);?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <?php if($row['productAvailability']=='In Stock'){?>
                                                        <div class="action"><a
                                                                href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="icon-button  btn btn-primary"><span><i
                                                                        class="glyphicon glyphicon-shopping-cart"></i></span></a>
                                                            <a class="icon-button btn btn-primary" data-toggle="tooltip"
                                                                data-placement="right" title="Wishlist"
                                                                href="product-details.php?pid=<?php echo ($row['id'])?>&&action=wishlist">
                                                                <i class="fa fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="action" style="color:red">Out of Stock</div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sections prod-slider-small outer-top-small">
                            <div class="row">
                                <div class="col-md-12">
                                    <section class="section">
                                        <h3 class="section-title">Smart Phones</h3>
                                        <div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme"
                                            data-item="3">
                                            <?php
$ret=mysqli_query($con,"select * from products where category=4 and subCategory=4");
while ($row=mysqli_fetch_array($ret)) {?>
                                            <div class="item item-carousel">
                                                <div class="products">

                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a
                                                                    href="product-details.php?pid=<?php echo ($row['id']);?>"><img
                                                                        src="<?php echo ($row['productImage1']);?>"
                                                                        width="220" height="300"></a>
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
                                                        <?php if($row['productAvailability']=='In Stock'){?>
                                                        <div class="action">
                                                            <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="icon-button  btn btn-primary">
                                                                <span><i
                                                                        class="glyphicon glyphicon-shopping-cart"></i></span>
                                                            </a>
                                                            <a class="icon-button btn btn-primary" data-toggle="tooltip"
                                                                data-placement="right" title="Wishlist"
                                                                href="product-details.php?pid=<?php echo ($row['id'])?>&&action=wishlist">
                                                                <i class="fa fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="action" style="color:red">Out of Stock</div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-12">
                                    <section class="section">
                                        <h3 class="section-title">Laptops</h3>
                                        <div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme"
                                            data-item="3">
                                            <?php
$ret=mysqli_query($con,"select * from products where category=4 and subCategory=6");
while ($row=mysqli_fetch_array($ret)) 
{?>
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a
                                                                    href="product-details.php?pid=<?php echo ($row['id']);?>"><img
                                                                        src="<?php echo ($row['productImage1']);?>"
                                                                        width="220" height="300"></a>
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
                                                                    Rs .<?php echo ($row['productPrice']);?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <?php if($row['productAvailability']=='In Stock'){?>
                                                        <div class="action">
                                                            <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                class="icon-button  btn btn-primary" >
                                                                <span><i
                                                                        class="glyphicon glyphicon-shopping-cart"></i></span>
                                                            </a>
                                                            <a class="icon-button btn btn-primary" data-toggle="tooltip"
                                                                data-placement="right" title="Wishlist"
                                                                href="product-details.php?pid=<?php echo ($row['id'])?>&&action=wishlist">
                                                                <i class="fa fa-heart"></i>
                                                            </a>
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="action" style="color:red">Out of Stock</div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                    </section>

                                </div>
                            </div>
                        </div>
                        <section class="section featured-product inner-xs ">
                            <h3 class="section-title">Fashion</h3>
                            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                                <?php
$ret=mysqli_query($con,"select * from products where category=6");
while ($row=mysqli_fetch_array($ret)) 
{?>
                                <div class="item">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row ">
                                                    <div class="col col-xs-12">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="product-details.php?pid=<?php echo ($row['id']);?>">
                                                                <img src="<?php echo ($row['productImage1']);?>"  width="220" height="300" style="margin-bottom: 20px"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col col-xs-12">
                                                        <div class="product-info">
                                                            <h3 class="name"><a
                                                                    href="product-details.php?pid=<?php echo ($row['id']);?>"><?php echo ($row['productName']);?></a>
                                                            </h3>
                                                            <?php include('includes/rating.php');?>
                                                            <div class="product-price">
                                                                <span class="price">
                                                                    Rs. <?php echo ($row['productPrice']);?>
                                                                </span>
                                                            </div>
                                                            <?php if($row['productAvailability']=='In Stock'){?>
                                                            <div class="action">
                                                                <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>"
                                                                    class=" btn btn-primary"
                                                                    >
                                                                    <span><i
                                                                            class="glyphicon glyphicon-shopping-cart"></i></span>
                                                                </a>
                                                                <a class=" btn btn-primary" data-toggle="tooltip"
                                                                    data-placement="right" title="Wishlist"
                                                                    href="product-details.php?pid=<?php echo ($row['id'])?>&&action=wishlist">
                                                                    <i class="fa fa-heart"></i>
                                                                </a>
                                                            </div>
                                                            <?php } else {?>
                                                            <div class="action" style="color:red">Out of Stock</div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php include('includes/footer.php');?>
    </footer>

    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>