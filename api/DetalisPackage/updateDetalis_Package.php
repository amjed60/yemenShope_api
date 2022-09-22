<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["det_PacID"])
   // && is_numeric($_POST["det_PacID"])
    && isset($_POST["det_PacName"])
    && isset($_POST["Active"])
 
    
    && is_auth()
) {
		
	
    $det_PacName = $_POST["det_PacName"];
    $Active = $_POST["Active"];
   
   
    $det_PacID = $_POST["det_PacID"];

    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($det_PacName)));
    array_push($updateArray, htmlspecialchars(strip_tags($Active)));
	
    array_push($updateArray, htmlspecialchars(strip_tags($det_PacID)));

		$sql = "update DetalisPackage 
		set det_PacName=?,Active=?
		where det_PacID=?";
	
    $result = dbExec($sql, $updateArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
