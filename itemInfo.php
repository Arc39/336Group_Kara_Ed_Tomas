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
            <?= print_r($result) ?>
        </div>
    </body>
</html>