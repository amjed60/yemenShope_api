<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["pro_id"])
    && is_numeric($_POST["pro_id"])
    && isset($_POST["isactive"])
    && isset($_POST["cous_des_active"])
 
    
    && is_auth()
) {
	

	$pro_id= $_POST["pro_id"];
    $isactive = $_POST["isactive"];
    $cous_des_active = $_POST["cous_des_active"];
    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($isactive)));
    array_push($updateArray, htmlspecialchars(strip_tags($cous_des_active)));
   
    array_push($updateArray, htmlspecialchars(strip_tags($pro_id)));

	
	
		$sql = "update product set isactive=?,cous_des_active=?
		where pro_id=?";
	
    $result = dbExec($sql, $updateArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
