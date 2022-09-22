<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["cit_id"])
    && is_numeric($_POST["cit_id"])
    && isset($_POST["cit_name"])
 
    
    && is_auth()
) {
		
	
    $cit_name = $_POST["cit_name"];
   
   
    $cit_id = $_POST["cit_id"];

    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($cit_name)));
	
    array_push($updateArray, htmlspecialchars(strip_tags($cit_id)));

		$sql = "update city 
		set cit_name=?
		where cit_id=?";
	
    $result = dbExec($sql, $updateArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
