<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";

    
		$sql = "select * from slider";
		$result = dbExec($sql, []);
	
    $arrJson = array();
    
        while ($row = $result->fetch(PDO::FETCH_ASSOC))
         {
            // extract($row);
            $arrJson[] = $row;
    }
  //  $resJson = array("result" => "success", "code" => "200", "message" => $arrJson);
    echo json_encode($arrJson);//, JSON_UNESCAPED_UNICODE);
