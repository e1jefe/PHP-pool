<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="
	width=device-width,
	height=device-height,
	initial-scale=1,
	minimum-scale=1,
	maximum-scale=1,
	user-scalable=0"/>
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/admin.css">
	<title>Fructo_ADM</title>
</head>
<body>
<div class="container">
	<table class="user-holder" cellpadding="5" cellspacing="5">
		<caption>All registered users</caption>
		<tr class="user-titels">
			<td>Name</td>
			<td>email</td>
			<td>phone nbr</td>
			<td>login</td>
		</tr>
        <?php
        require_once 'db_connect.php';
        ?>
<?php session_start(); 
$file = 'user_base/passwd';
$file_cont = unserialize(file_get_contents($file));
foreach ($file_cont as $key => $v): 
	if ($v['login'] === 'admin')
		continue ;
		?>
		<tr class="user">
			<td class="user-info">
				<?=$v["name"]?>
			</td>
			<td class="user-info">
				<?=$v["email"]?>
			</td>
			<td class="user-info">0
				<?=$v["phone-nbr"]?>				
			</td>
			<td class="user-info">
				<?=$v["login"]?>
			</td>
			<td><a href="admin-delet.php?id=<?=$v['login']?>">DELETE</a></td>
		</tr>
<?php endforeach; ?>
        <?php
        function get_goods1($link, $param)
        {
            $sql = "SELECT * FROM products";
            $result = mysqli_query($link, $sql);
            $data = mysqli_fetch_all($result, 1);
            return $data;
        }
        ?>
        <?php
        $gds = get_goods1($link, $_POST['products']);
        ?>
        <?php
        foreach ($gds as $key => $v):
        ?>
            <tr class="user">
                <td class="user-info">
                <?=$v["id_product"]?>
            </td>
                <td class="user-info">
                <?=$v["title"]?>
            </td>
                <td class="user-info">
                <?=$v["price"]?>
            </td>
                <td class="user-info">
                <?=$v["category"]?>
            </td>
                <td class="user-info">
                    <img src="<?=$v['img_url']?>" style="height: 100px; width: 100px;">
            </td>
        </tr>
        <?php endforeach; ?>
	</table>

</div>
</body>
</html>

<div class="user">
    <td>
        <form class="edit_product" method="post">
            <label>title</label><input required type="text" name="title" />
            <br>
            <label>price</label><input required type="text" name="price"/>
            <br>
            <label>category</label><input required type="text" name="category"/>
            <br>
            <label>sku</label><input required type="text" name="sku"/>
            <label>img_url</label><input required type="text" name="img_url"/>
            <br><br>
            <input class="btn add" type="submit" name="add_product" value="Add"/>
        </form>

        </td>

</div>

<?php
if (isset($_POST['add_product']) && ($_POST['add_product'] == "Add")) {

    $title = $_POST['title'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $sku = $_POST['sku'];
    $img_url = $_POST['img_url'];

    $sql = "INSERT INTO products (title, price, category, sku , img_url) 
VALUES ({$title}, {$price}, {$category}, {$sku}, {$img_url})";

    if (mysqli_query($link, $sql)) {
        echo "<center><font color='#adff2f'>Goods " . $title . " adds\n" . "</font></center><br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
}
?>