<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["cus_id"])
    && is_numeric($_POST["cus_id"])
    && isset($_POST["cus_block"])
 
    
    && is_auth()
) {
	

	$cus_id= $_POST["cus_id"];
    $cus_block = $_POST["cus_block"];
    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($cus_block)));
   
    array_push($updateArray, htmlspecialchars(strip_tags($cus_id)));

	
	
		$sql = "update customer set cus_block=?
		where cus_id=?";
	
    $result = dbExec($sql, $updateArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
