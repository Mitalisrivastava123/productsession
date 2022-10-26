<?php
session_start();

if (!isset($_SESSION['carts'])) {
	$_SESSION['carts'] = [];
}
?>
<?php include 'header.php'; ?>
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>

<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>

	<div id="main">
		<div id="products">
		</div>
	</div>
	<?php
	foreach ($products as $k => $v) {
		// echo $v;
		echo '<div id="product-101" class="product">';
		echo '<br>';
		echo '<img src="' . $v["image"] . '"';
		echo '<h3 class="title"><a href="#">Product"' . $v["id"] . "</a></h3>'";
		echo '<br>';
		echo '<span>Price"' . $v["price"] . '"</span>';
		echo '<br>';
		echo '<form action="" method="post"><input type="hidden" name="adding" value="'.$k.'"><button type="submit" name="add">Add to cart</button></form>';
		// echo '<a class="add-to-cart" id="'.$k.'" name="add" href="#">Add to Cart</a></div>"';
		echo '</div>';
	}
	?>
	<?php
	if (isset($_POST["add"])) {
		$y = $_POST['adding'];
		foreach ($products as $k => $v) {
			if($y == $k)
			{
			array_push($_SESSION['carts'],$v);
			}
		
		}
		// print_r($_SESSION['carts']);
		

	}



	echo "<table border='1px'>";
	foreach($_SESSION['carts'] as $k1 => $v1)
		{
	    // echo $v;
		echo "<tr>";
		echo '<td><img src="' . $v1["image"] . '"</td>';
		echo '<td><h3 class="title"><a href="#">Product"' . $v1["id"] . "</a></h3>'</td>";
		echo '<td><span>Price"' . $v1["price"] . '"</span></td>';
		}
echo "</table>";
	?>






	<!-- 
	?> -->

	<!-- <div id="main">
		<div id="products">
			<div id="product-101" class="product">
				<img src="images/football.png">
				<h3 class="title"><a href="#">Product 101</a></h3>
				<span>Price: $150.00</span>
				<a class="add-to-cart" href="#">Add To Cart</a>
			</div>
			<div id="product-101" class="product">
				<img src="images/tennis.png">
				<h3 class="title"><a href="#">Product 102</a></h3>
				<span>Price: $120.00</span>
				<a class="add-to-cart" href="#">Add To Cart</a>
			</div>
			<div id="product-101" class="product">
				<img src="images/basketball.png">
				<h3 class="title"><a href="#">Product 103</a></h3>
				<span>Price: $90.00</span>
				<a class="add-to-cart" href="#">Add To Cart</a>
			</div>
			<div id="product-101" class="product">
				<img src="images/table-tennis.png">
				<h3 class="title"><a href="#">Product 104</a></h3>
				<span>Price: $110.00</span>
				<a class="add-to-cart" href="#">Add To Cart</a>
			</div>
			<div id="product-101" class="product">
				<img src="images/soccer.png">
				<h3 class="title"><a href="#">Product 105</a></h3>
				<span>Price: $80.00</span>
				<a class="add-to-cart" href="#">Add To Cart</a>
			</div>
		</div>
	</div> -->

	<?php include 'footer.php'; ?>

</body>

</html>