<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (
    isset($_POST["cit_id"])
    &&isset($_POST["str_name"])
    
  
  
) {
	
    $str_name = $_POST["str_name"];
    $cit_id = $_POST["cit_id"];

   
	
	


    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($str_name)));
    array_push($insertArray, htmlspecialchars(strip_tags($cit_id)));
	
	 

    $sql = "insert into street
        (str_name,cit_id   )
            values(? ,? )";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
