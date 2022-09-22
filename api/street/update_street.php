<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["str_id"])
    && is_numeric($_POST["str_id"])
    && isset($_POST["str_name"])
     && isset($_POST["cit_id"])
 
    
    && is_auth()
) {
		
	
    $cit_id = $_POST["cit_id"];
    $str_name = $_POST["str_name"];

   
   
    $str_id = $_POST["str_id"];

    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($cit_id)));
    array_push($updateArray, htmlspecialchars(strip_tags($str_name)));

	
    array_push($updateArray, htmlspecialchars(strip_tags($str_id)));

		$sql = "update street set cit_id=?,str_name=?
		    where str_id=?";
	
    $result = dbExec($sql, $updateArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
