<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["dis_id"])
    && is_numeric($_POST["dis_id"])
    && isset($_POST["isactive"])
 
    
    && is_auth()
) {
	

	$dis_id= $_POST["dis_id"];
    $isactive = $_POST["isactive"];
    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($isactive)));
   
    array_push($updateArray, htmlspecialchars(strip_tags($dis_id)));

	
	
		$sql = "update discounts set isactive=?
		where dis_id=?";
	
    $result = dbExec($sql, $updateArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
