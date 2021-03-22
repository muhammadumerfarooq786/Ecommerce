<?php 
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>Order History</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">

    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

</head>

<body class="cnt-home">
    <header class="header-style-1">
        <?php include('includes/header.php');?>
    </header>

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row inner-bottom-sm">
                <div class="shopping-cart">
                    <div class="col-md-12 col-sm-12 shopping-cart-table ">
                        <div class="table-responsive">
                            <form name="cart" method="post">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="cart-romove item">#</th>
                                            <th class="cart-description item">Image</th>
                                            <th class="cart-product-name item">Product Name</th>
                                            <th class="cart-qty item">Quantity</th>
                                            <th class="cart-sub-total item">Price Per unit</th>
                                            <th class="cart-total item">Grandtotal</th>
                                            <th class="cart-total item">Payment Method</th>
                                            <th class="cart-description item">Order Date</th>
                                            <th class="cart-total last-item">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
$orderid=$_POST['orderid'];
$email=$_POST['email'];
$ret = mysqli_query($con,"select t.email,t.id from (select usr.email,odrs.id from users as usr join orders as odrs on usr.id=odrs.userId) as t where  t.email='$email' and (t.id='$orderid')");
$num=mysqli_num_rows($ret);
if($num>0)
{
$query=mysqli_query($con,"select products.productImage1 as pimg1,products.productName as pname,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id where orders.id='$orderid' and orders.paymentMethod is not null");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td class="cart-image">
                                                <a class="entry-thumbnail" href="detail.html">
                                                    <img src="<?php echo $row['pimg1'];?>" alt="" width="84"
                                                        height="146">
                                                </a>
                                            </td>
                                            <td class="cart-product-name-info">
                                                <h4 class='cart-product-description'><a
                                                        href="product-details.php?pid=<?php echo $row['opid'];?>">
                                                        <?php echo $row['pname'];?></a></h4>


                                            </td>
                                            <td class="cart-product-quantity">
                                                <?php echo $qty=$row['qty']; ?>
                                            </td>
                                            <td class="cart-product-sub-total"><?php echo $price=$row['pprice']; ?>
                                            </td>
                                            <td class="cart-product-grand-total"><?php echo $qty*$price;?></td>
                                            <td class="cart-product-sub-total"><?php echo $row['paym']; ?> </td>
                                            <td class="cart-product-sub-total"><?php echo $row['odate']; ?> </td>

                                            <td>
                                                <a href="javascript:void(0);"
                                                    onClick="popUpWindow('track-order.php?oid=<?php echo htmlentities($row['orderid']);?>');"
                                                    title="Track order">
                                                    Track
                                            </td>
                                        </tr>
                                        <?php $cnt=$cnt+1;} } else { ?>
                                        <tr>
                                            <td colspan="8">Either order id or Registered email id is invalid</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div> 
            </form>
        </div>
    </div>

    <?php include('includes/footer.php');?>

    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>