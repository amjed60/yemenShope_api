<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["not_id"])
    && is_numeric($_POST["not_id"])
    && isset($_POST["not_name"])
     && isset($_POST["isactive"])
 
    
    && is_auth()
) {
		
	
    $isactive = $_POST["isactive"];
    $not_name = $_POST["not_name"];

   
   
    $not_id = $_POST["not_id"];

    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($isactive)));
    array_push($updateArray, htmlspecialchars(strip_tags($not_name)));

	
    array_push($updateArray, htmlspecialchars(strip_tags($not_id)));

		$sql = "update notification set isactive=?,not_name=?
		    where not_id=?";
	
    $result = dbExec($sql, $updateArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
