<?php 
include 'connect.php';

$con = getDBConnection("makeup");

function getItems(){
    global $con;
    $namedParameters = array();
    $results = null;
    if(isset($_GET['submit'])){
        
        $sql = "select * from eyemakeup union select * from facemakeup union select * from skincare where 1";
        if(isset($_GET['category'])){
            $value = $_GET['category'];
            if($value == "eyemakeup"){
                $sql = "select * from eyemakeup ";
            }elseif($value == "facemakeup"){
                $sql = "select * from facemakeup ";
            }elseif($value == "skincare"){
                $sql = "select * from skincare ";
            }
        }
        if(isset($_GET['itemName']) && ($_GET['itemName'] != "")){
            $sql .=" and name LIKE :itemName";
            $namedParameters[':itemName'] = '%'.$_GET['itemName'].'%';
        }
        
        //Show only items that are available
        if (isset($_GET['status']) ) { 

            $sql .= " AND quantity > 0 ";
        }
        //order items by price asc or desc
        if(isset($_GET['price'])){
            if($_GET['price'] == "asc"){
                $sql .=  "order by price";
            }
            else{
                $sql .= "order by price desc ";
            }
        }

        $stmt = $con -> prepare ($sql);
        $stmt -> execute($namedParameters);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<table id=\"t01\">
            <tr>
 	        <th>Id</th>
 	        <th>Name</th>
 	      <th>brand</th>
         	<th>Price</th>
         	<th>Quantity (in stock)</th>
         	<th></th>
         </tr>";
        foreach($results as $result) {
            echo "<tr>";
            echo "<td>".$result['id']."</td>";
            echo "<td><a href=\"itemInfo.php?name=".$result['name']. "&id=" .
                        $result['id']."\">" . $result['name'] ."</a></td>";
            echo "<td>".$result['brand']."</td>";
            echo "<td>".$result['price']."</td>";
            echo "<td>".$result['quantity']."</td>";
            echo "<td><a href=\"cart.php?name=".$result['name']. "&id=" .
                    $result['id']."\">Add to cart</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

?>


<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="assets/styles.css">
</head>
<body>
	<div id = "wrapper">
	<h2 style="color: magenta">K.E.T. Sparkle Make-Up Store</h2>
<form id="indexForm">
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
  	<input type="submit" value="Search" name="submit" />

</form>

<br />
<br />
<br />
<center>

 	<?php 
 	  getItems();
    ?>
	
 </center>
=======
 <h5>Team Project Document: <a href="https://docs.google.com/a/csumb.edu/document/d/1ln7ktQkBeje3rY5gmujfZhuwDehoxkquepxcOcVr-o4/edit?usp=sharing">Link</a></h5>
 <h5>Disclaimer: This is not a real website, don't input any personal financial information</h5>

 </div>
</body>

 </html>