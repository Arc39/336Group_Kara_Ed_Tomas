<?php 
include 'connect.php';

$con = getDBConnection("makeup");

function getItems(){
    global $con;
    $namedParameters = array();


    // if(isset($_GET['category'])){
        //put category as table name in sql, but just gives me error
    // }
    $sql = "select * from eyemakeup union select * from facemakeup union select * from skincare where 1";
    
    if(isset($_GET['itemName'])){
        $sql .=" and name LIKE :itemName";
        $namedParameters[':itemName'] = '%'.$_GET['itemName'].'%';
    }
        
        //Show only items that are available
        if (isset($_GET['status']) ) { 
        
            $sql .= " AND quantity > 0 ";
        }
        //order items by price asc or desc
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

    $stmt = $con -> prepare ($sql);
    $stmt -> execute($namedParameters);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;

}

?>


<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="assets/styles.css">
</head>
<body>
	<div id = "wrapper">
	<h2 style="color: magenta">K.E.T. Sparkle Make-Up Store</h2>
<form>
	<br /> <br />
	Item: 
    <input type="text" name="itemName"/>
    
    <!--I was thinking we can use category to pick the table, but I just get errors when I try to use a variable-->
    <!--or named parameter for table in sql statement-->
    Category: <input type="radio" name="category" value="eyemakeup" ><label for="eyemakeup"> Eye </label>
            <input type="radio" name="category" value="facemakeup" > <label for="facemakeup">  Face </label>
            <input type="radio" name="category" value="skincare" > <label for="skincare">  Skin </label>
    <br />
    <input type="checkbox" name="status" id="status"/>
    <label for="status"> Show Available Items Only </label>

    <br />
    <label for="price">Sort by:</label>
    <input type="radio" name="price" value="asc"> Ascending
  	<input type="radio" name="price" value="desc"> Descending
  	<input type="submit" value="Search" />

</form>

<br />
<br />
<br />
<center>


 <table id="t01">
 <tr>
 	<th>Id</th>
 	<th>Name</th>
 	<th>brand</th>
 	<th>Price</th>
 	<th>Quantity (in stock)</th>
 	<!--<th>Buy</th>-->
 </tr>
 	<?php 
 	$results = getItems();
    foreach($results as $result) {
                echo "<tr>";
                echo "<td>".$result['id']."</td>";
                echo "<td>".$result['name']."</td>";
                echo "<td>".$result['brand']."</td>";
                echo "<td>".$result['price']."</td>";
                echo "<td>".$result['quantity']."</td>";
                // echo "<td>"."<input type='checkbox' name='buy' id='buy'/></td>";
                echo "</tr>";
            }
            
    ?>
	

	
 </table>

 </center>
=======
 <h5>Team Project Document: <a href="https://docs.google.com/a/csumb.edu/document/d/1ln7ktQkBeje3rY5gmujfZhuwDehoxkquepxcOcVr-o4/edit?usp=sharing">Link</a></h5>
 <h5>Disclaimer: This is not a real website, don't input any personal financial information</h5>

 </div>
</body>

 </html>