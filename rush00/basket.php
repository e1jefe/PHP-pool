<?php
error_reporting(0);
session_start();
$total=0;
$conn = new PDO("mysql:host=localhost;dbname=db-shop", 'root', '9581590');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$action = isset($_GET['action'])?$_GET['action']:"";

if($action=='addcart' && $_SERVER['REQUEST_METHOD']=='POST') {

    $query = "SELECT * FROM products WHERE sku=:sku";
    $stmt = $conn->prepare($query);
    $stmt->bindParam('sku', $_POST['sku']);
    $stmt->execute();
    $product = $stmt->fetch();

    $currentQty = $_SESSION['products'][$_POST['sku']]['qty']+1; 
    $_SESSION['products'][$_POST['sku']] =array('qty'=>$currentQty,'title'=>$product['title'],'img_url'=>$product['img_url'],'price'=>$product['price']);
    $product='';
    header("Location:basket.php");
}

if($action=='emptyall') {
    $_SESSION['products'] =array();
    header("Location:basket.php");
}


if($action=='empty') {
    $sku = $_GET['sku'];
    $products = $_SESSION['products'];
    unset($products[$sku]);
    $_SESSION['products']= $products;
    header("Location:basket.php");
}


$query = "SELECT * FROM products";
$stmt = $conn->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="
        width=device-width,
        height=device-height,
        initial-scale=1,
        minimum-scale=1,
        maximum-scale=1,
        user-scalable=0"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <title>My cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="width:600px;">
    <?php if(!empty($_SESSION['products'])):?>
        <nav class="navbar navbar-inverse" style="background:#528354;">
            <div class="container-fluid pull-left" style="width:300px;">
                <div class="navbar-header"> <a class="navbar-brand" href="#" style="color:#FFFFFF;">Shopping Cart</a> </div>
            </div>
            <div class="pull-right" style="margin-top:7px;margin-right:7px;"><a href="basket.php?action=emptyall" class="btn btn-info">Empty cart</a></div>
            <div class="pull-fff" style="margin-top:7px;margin-right:20px;"><a href="https://send.monobank.com.ua/2tWzbzQhr" class="btn btn-info">Pay online</a></div>
            <div class="pull-fff" style="margin-top:7px;margin-right:20px;"><a href="buy.php?id=<?=$_SESSION['is_log']?>" class="btn btn-info">Buy items</a></div>
        </nav>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
            </thead>
            <?php foreach($_SESSION['products'] as $key=>$product):?>
                <tr>
                    <td><img src="<?php print $product['img_url']?>" width="50"></td>
                    <td><?php print $product['title']?></td>
                    <td><?php print $product['price']?></td>
                    <td><?php print $product['qty']?></td>
                    <td><a href="basket.php?action=empty&sku=<?php print $key?>" class="btn btn-info">Delete</a></td>
                </tr>
                <?php $total = $total + $product ['price'] * $product['qty'];?>
            <?php endforeach;?>
            <tr><td colspan="5" align="right"><h4>Total:$<?php print $total?></h4></td></tr>
        </table>
    <?php endif;?>
    <nav class="navbar navbar-inverse" style="background:#528354;">
        <div class="container-fluid">
            <div class="navbar-header"> <a class="navbar-brand" href="index.php" style="color:#FFFFFF;">Back to main page</a> </div>
        </div>
    </nav>
    <div class="row">
        <div class="container" style="width:600px;">
            <?php foreach($products as $product):?>
                <div class="col-md-4">
                    <div class="thumbnail"> <img src="<?php print $product['img_url']?>" alt="Lights">
                        <div class="caption">
                            <p style="text-align:center;"><?php print $product['title']?></p>
                            <p style="text-align:center;color:#04B745;"><b>$<?php print $product['price']?></b></p>
                            <form method="post" action="basket.php?action=addcart">
                                <p style="text-align:center;color:#04B745;">
                                    <button type="submit" class="btn btn-warning">Add To Cart</button>
                                    <input type="hidden" name="sku" value="<?php print $product['sku']?>">
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
</body>
</html>