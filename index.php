<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="assets/styles.css">
</head>
<body>
	
<form>
	search for: 
    <input type="text" name="itemName"/>
    <input type="submit" value="Search" />
</form>

<?php 
require 'connect.php';
$sql = 'SELECT * FROM eyemakeup ';
$result = mysqli_query($con, $sql);
 ?>

 <table id="t01">
 <tr>
 	<th>Id</th>
 	<th>Name</th>
 	<th>brand</th>
 	<th>Price</th>
 	<th>Quantity (in stock)</th>
 	<th>Buy</th>
 </tr>
 	<?php while($product = mysqli_fetch_object($result)) { ?> 
	<tr>
		<td> <?php echo $product->id; ?> </td>
		<td> <?php echo $product->name; ?> </td>
		<td> <?php echo $product->brand; ?></td>
		<td> <?php echo $product->price; ?> </td>
		<td> <?php echo $product->quantity; ?> </td>
		<td> <a href="cart.php?id= <?php echo $product->id; ?> &action=add">Order Now</a> </td>
	</tr>
	<?php } ?>






<?php 
$sql = 'SELECT * FROM facemakeup ';
$result = mysqli_query($con, $sql);
 ?>

 <table id="t01">
 <tr>
 	<th>Id</th>
 	<th>Name</th>
 	<th>brand</th>
 	<th>Price</th>
 	<th>Quantity (in stock)</th>
 	<th>Buy</th>
 </tr>
 	<?php while($product = mysqli_fetch_object($result)) { ?> 
	<tr>
		<td> <?php echo $product->id; ?> </td>
		<td> <?php echo $product->name; ?> </td>
		<td> <?php echo $product->brand; ?></td>
		<td> <?php echo $product->price; ?> </td>
		<td> <?php echo $product->quantity; ?> </td>
		<td> <a href="cart.php?id= <?php echo $product->id; ?> &action=add">Order Now</a> </td>
	</tr>
	<?php } ?>







<?php 

$sql = 'SELECT * FROM skincare ';
$result = mysqli_query($con, $sql);
 ?>

 <table id="t01">
 <tr>
 	<th>Id</th>
 	<th>Name</th>
 	<th>brand</th>
 	<th>Price</th>
 	<th>Quantity (in stock)</th>
 	<th>Buy</th>
 </tr>
 	<?php while($product = mysqli_fetch_object($result)) { ?> 
	<tr>
		<td> <?php echo $product->id; ?> </td>
		<td> <?php echo $product->name; ?> </td>
		<td> <?php echo $product->brand; ?></td>
		<td> <?php echo $product->price; ?> </td>
		<td> <?php echo $product->quantity; ?> </td>
		<td> <a href="cart.php?id= <?php echo $product->id; ?> &action=add">Order Now</a> </td>
	</tr>
	<?php } ?>
	
	
	
	
	
	
 </table>
</body>

 </html>