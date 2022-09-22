<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (
    isset($_POST["sho_id"])
  
  
) {
	
    $sho_id = $_POST["sho_id"];
    $cus_id = $_POST["cus_id"];
   
	
	


    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($sho_id)));
    array_push($insertArray, htmlspecialchars(strip_tags($cus_id)));
	
	 

    $sql = "insert into userFollowshope
        (sho_id ,cus_id  )
            values(?,?  )";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
