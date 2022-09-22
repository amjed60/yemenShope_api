<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["com_id"])
   // && is_numeric($_POST["com_id"])
    && isset($_POST["com_name"])
   
    && is_auth()
) {
		
    $com_name = $_POST["com_name"];
   
    $com_id = $_POST["com_id"];

    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($com_name)));
  
    array_push($updateArray, htmlspecialchars(strip_tags($com_id)));

	
		$sql = "update comment 
		set com_name=?
		where com_id=?";
	
    $result = dbExec($sql, $updateArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
