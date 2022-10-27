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
	<!-- foreach loop for array product -->
	<?php
	foreach ($products as $k => $v) {
		echo '<div id="product-101" class="product">';
		echo "<img src=" . $v["image"] . ">";
		echo '<h3 class="title"><a href="#">Product"' . $v["id"] . "</a></h3>'";
		echo "<span>Price" . $v["price"] . "</span>";
		echo '<form action="" method="post"><input type="hidden" name="adding"  value="' . $v["id"]. '"><button type="submit" class="adds" name="add">Add to cart</button></form>';
		echo '</div>';
	}
	?>
		</div>
</div>
	<?php
	if (isset($_POST["add"])) {
		$y = $_POST['adding'];
		$flag = 0;
		foreach ($_SESSION['carts'] as $k5 => $v5) {
			if ($v5["id"]==$y) {
				$flag = 1;
			}
		}
		if ($flag == 0) {
			foreach ($products as $k => $v) {
				if ($v["id"]==$y) {
	
					array_push($_SESSION['carts'], $v);
				}
			}
		} else {
			foreach ($_SESSION['carts'] as $k6 => $v6)
				if ($v6["id"]==$y) {
					$_SESSION['carts'][$k6]["quantity"] += 1;
				}
		}

	}
// delete product
	if (isset($_POST["delete"])) {
		$m1 = $_POST["deleting"];
		foreach ($_SESSION['carts'] as $k2 => $v2) {
			if ($k2 == $m1) {
				array_splice($_SESSION['carts'], $k2, 1);
			}
		}
	}
	// empty cart
	if(isset($_POST['emptycart']))
	{
	   $_SESSION['carts']=[];
	}
// quantity increase
	if(isset($_POST['plus1']))
	{
		foreach($_SESSION['carts'] as $k3 => $v3)
		{
			// echo $v3;
			$m2 = $_POST["plus"];
			if($k3 == $m2)
			{
			$_SESSION['carts'][$k3]["quantity"] +=1;
			}
		}
	}

	if(isset($_POST['del1']))
	{
		foreach($_SESSION['carts'] as $k4 => $v4)
		{
		
			$m3 = $_POST["del"];
			
			if($v4["quantity"]>1 && $k4== $m3)
			{
			$_SESSION['carts'][$k4]["quantity"]-= 1;
			}
			  else if($v4["quantity"]<=1 && $k4== $m3)
			  {
				
				array_splice($_SESSION['carts'],$k4,1);
			  }
			}
		}
		// Add to cart
     echo "<h3>Products Add to Cart</h3>";
	echo "<table border='1px'>";
	echo "<th>Id</th><th>Image</th><th>Price</th><th>Quantity</th><th>Delete product</th>";
	foreach ($_SESSION['carts'] as $k1 => $v1) {
		echo "<tr>";
		echo '<td><h3 class="title"><a href="#">Product"' . $v1["id"] . "</a></h3>'</td>";
		echo '<td><img src="' . $v1["image"] . '"</td>';
		echo '<td><span>Price"' . $v1["price"] . '"</span></td>';
		echo '<td><form action="" method="post"><input type="hidden" name="del" value='.$k1.'><button type="submit" name="del1">-</button>'.$v1["quantity"].'<input type="hidden" name="plus" value='.$k1.'><button type="submit" name="plus1">+</button></td><td><input type="hidden" name="deleting" value="' . $k1 . '"><button type="submit" class="adds1" name="delete">Delete</button></td></form>';
	   
	}
	echo "</table>";
	echo '<form action="" method="post"><button type="submit" id="btn1" name="emptycart" style="background:#3e9cbf;border:none;color:#fff;padding:10px;">Empty Cart</button></form>';
?> 
	<?php include 'footer.php'; ?>
</body>

</html>