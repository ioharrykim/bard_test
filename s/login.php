<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    $mem_id = $_GET["mem_id"];
    $mem_pw = $_GET["mem_pw"];
	
    echo file_get_contents("https://www.dentalemart.co.kr/event/atc/cert.php?mem_id=".$mem_id."&mem_pw=".$mem_pw);
    //print json_encode($ret);

?>

