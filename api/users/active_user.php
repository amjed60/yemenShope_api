<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["use_id"])
    && is_numeric($_POST["use_id"])
    && isset($_POST["use_active"])
 
    
    && is_auth()
) {
	

	$use_id= $_POST["use_id"];
    $use_active = $_POST["use_active"];
    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($use_active)));
   
    array_push($updateArray, htmlspecialchars(strip_tags($use_id)));

	
	
		$sql = "update users set use_active=?
		where use_id=?";
	
    $result = dbExec($sql, $updateArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
