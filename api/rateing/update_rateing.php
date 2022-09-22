<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["sho_id"])
    //&& is_numeric($_POST["sho_id"])
   // && isset($_POST["mal_name"])
   // && isset($_POST["mal_not"])
    
    && is_auth()
) {
	
   
	$rating = $_POST["rating"];
    $cus_id = $_POST["cus_id"];
    $sho_id = $_POST["sho_id"];
    
    $rat_name = $_POST["rat_name"];//== null ? " " : $_POST["rat_name"]  ;
    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($rating)));
    array_push($updateArray, htmlspecialchars(strip_tags($rat_name)));
    array_push($updateArray, htmlspecialchars(strip_tags($cus_id)));
  
    array_push($updateArray, htmlspecialchars(strip_tags($sho_id)));


	
		$sql = "update rateingshope 
		set rating=? ,rat_name=?
		where cus_id=? and sho_id=?";

    $result = dbExec($sql, $updateArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
