<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="assets/styles.css">
</head>
<body>
	<div id = "wrapper">
	
<form>
	<br>
	search for: 
    <input type="text" name="itemName"/>
    <input type="submit" value="Search" />
    
    <input type="checkbox" name="status" id="status"/>
    <label for="status"> Check Availability </label>
    
    <input type="radio" name="order" value="acs" id="acs">
    <label for="acs"> high to low </label>
    
</form>

<br>
<br>
<br>
<center>
<?php 
require 'connect.php';
$sql = 'select * from eyemakeup union select * from facemakeup union select * from skincare ';
$result = mysqli_query($con, $sql);

if(isset($_GET['order']))
{
    $sql .=  "order by price ";
    $result = mysqli_query($con, $sql);
}


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
 </center>
 </div>
</body>

 </html>