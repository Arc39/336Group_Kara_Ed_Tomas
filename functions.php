<?php
function getItemInfo($id, $name){
    global $con;
    $sql = "select * from (select * from eyemakeup 
            union select * from facemakeup 
            union select * from skincare) AS U
            WHERE (U.id = " .  $id . ")";
    $stmt = $con -> prepare ($sql);
    $stmt -> execute($namedParameters);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

?>