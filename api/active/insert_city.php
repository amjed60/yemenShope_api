<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (
    isset($_POST["cit_name"])
  
  
) {
	
    $cit_name = $_POST["cit_name"];
   
	
	


    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($cit_name)));
	
	 

    $sql = "insert into city
        (cit_name   )
            values(?  )";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
