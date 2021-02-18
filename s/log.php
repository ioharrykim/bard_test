<?php
// Allow from any origin

if (isset($_SERVER['HTTP_ORIGIN'])) {
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
  header('Access-Control-Allow-Credentials: true');
  header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
      header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
      header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

  exit(0);
}

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }
  require_once './db_main.php';
  require_once './db.php';

  $mem_id = $_REQUEST["mem_id"];
  $data = $_REQUEST["data"];

  
    DB::insert("VIEWDATA",[
        "mem_id" => $mem_id,
        "link_id" => $data
    ]);

  echo json_encode($output);
  /*
  if( $pid != "" ) {
    $lists = DB::query('select * from SURVEY where pid = %d', $pid);
    echo json_encode($lists);
  } else {
    $lists = DB::query('select * from COMMENTS where pid = 0 and uid = %d', $uid);
    echo json_encode($lists);
  }
  */

?>
