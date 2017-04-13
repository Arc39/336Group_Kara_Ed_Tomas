<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="assets/styles.css">
</head>
<body>
	<div id = "wrapper">
	<h2 style="color: magenta">K.E.T. Sparkle Make-Up Store</h2>
<form>
	<br>
	search for: 
    <input type="text" name="itemName"/>
    <select>
    	<option value="face">Face</option>
    	<option value="eye">Eye</option>
    	<option value="skin">Skin</option>
    </select>
    <input type="checkbox" name="status" id="status"/>
    <label for="status"> Check Availability </label>

    <br>
    <label for="price">Sort by:</label>
    <input type="radio" name="price" value="asc"> Ascending
  	<input type="radio" name="price" value="desc"> Descending
  	<input type="submit" value="Search" />

</form>

<br>
<br>
<br>
<center>
<?php 
require 'connect.php';
$sql = 'select * from eyemakeup union select * from facemakeup union select * from skincare ';
$result = mysqli_query($con, $sql);
////////////////////////////////////////////////////////////////////////////////////////////////////
// this code here does not want to filter out the quantities
if(isset($_GET['status']))
{
    $sql .= ' where quantity > 0 ';
}
///////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_GET['price']))
{
    if($_GET['price'] == "asc")
    {
        $sql .=  "order by price ";
    }
    else
    {
        $sql .= "order by price desc ";
    }
    
    
}
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

 </center>
=======
 <h5>Team Project Document: <a href="https://docs.google.com/a/csumb.edu/document/d/1ln7ktQkBeje3rY5gmujfZhuwDehoxkquepxcOcVr-o4/edit?usp=sharing">Link</a></h5>
 <h5>Disclaimer: This is not a real website, don't input any personal financial information</h5>

 </div>
</body>

</html>