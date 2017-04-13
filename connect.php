<?php
function getDBConnection($dbname){
    $host = "localhost";
    $username = "web_user";
    $password = "s3cr3t";
    
    //connecting to the database
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //Setting Errorhandling to Exception
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    return $dbConn; 
}  
?>