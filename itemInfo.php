<?php
    include 'connect.php';
    $con = getDBConnection("makeup");
    require 'functions.php';
    $result = array();
    if(isset($_GET['id']) && isset($_GET['name'])){
        $items = getItemInfo($_GET['id'], $_GET['name']);
        foreach($items as $item){
            if($item['name'] == urldecode($_GET['name'])){
                $result = $item;
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Item Info </title>
        <link rel="stylesheet" href="assets/styles.css">
    </head>
    <body>
        <div id="wrapper">
            <a href="index.php" style="align: left">&lt;-Go Back</a>
            <?php 
                echo "<h3>". $result['name'] . "</h3>";
                echo "<h3> By: " . $result['brand'] . "</h3>";
                echo "<h3>$". $result['price'] . "</h3>";
                echo "<h3> Quantity: ". $result['quantity'] . "</h3>";
                echo "<a href=\"cart.php?name=".$result['name']. "&id=" .
                    $result['id']."\">Add to cart</a></td>";
            ?>
        </div>
    </body>
</html>