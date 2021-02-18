<?php 
    $mem_id = $_GET["mem_id"];
    session_start();
    if( $mem_id != "" ) {
        $_SESSION["mem_id"] = $mem_id;
    }
    $result = [];
    $result["result"] = true;
   
    echo json_encode($result);
?>