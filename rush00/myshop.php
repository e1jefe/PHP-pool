<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
require_once 'db_connect.php';
?>

<?php

function get_goods($link, $param)
{
  if ($param === 'fruits')
    $sql = "SELECT * FROM products WHERE category='Fruits'";
  else if ($param === 'vegies')
    $sql = "SELECT * FROM products WHERE category='Vegetables'";
  else
    $sql = "SELECT * FROM products";
  $result = mysqli_query($link, $sql);
  $data = mysqli_fetch_all($result, 1);
  return $data;
}

function add_product($product, $link)
{
    $query = "INSERT INTO products (title, price, category, img_url)
       VALUES ({$product[title]}, $product[price], $product[category], $product[img_url]);";
    return (mysqli_query($link, $query));
}

function update_product($product, $link)
{
    $query = "UPDATE products
      SET title = {$product['title']}, price = {$product['price']}, category = {$product['price']}, img_url = {$product['img_url']}
      WHERE id_product = {$product['id_product']}";
    return (mysqli_query($link, $query));
}

function delete_product($product, $link)
{
    $query = "DELETE products
      FROM title = {$product['title']}, price = {$product['price']}, category = {$product['price']}, img_url = {$product['img_url']}
      WHERE id_product = {$product['id_product']}";
    return (mysqli_query($link, $query));
}

?>
<?php
  $goods = get_goods($link, $_POST['category']);
?>

<?php foreach ($goods as $v): ?>
    <div class="price-package">
      <div class="plan-name">
        <?=$v["title"]?>
      </div>
    <img src="<?=$v['img_url']?>">
    <div class="price-amount">
      <?=$v["price"]."$"?>
    </div>
    <form method="post" action="basket.php"><button type="submit" name="sku" value="<?=$v['sku']?>">Add to cart</button></form>
    <div class="details">
      <p>
        <?=$v['sku']?>
      </p>
      <p>
        <?=$v['category']?>
      </p>
      <p>
        <?=$v['sub_category']?>
      </p>
    </div>
  </div>
<?php endforeach; ?>

</body>
</html>
