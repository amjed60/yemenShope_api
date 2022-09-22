<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (
    isset($_POST["sho_id"])
    && isset($_POST["rating"])
    && isset($_POST["sho_id"])
  
) {
	$rating = $_POST["rating"];
    $cus_id = $_POST["cus_id"];
    $sho_id = $_POST["sho_id"];
    $rat_name = $_POST["rat_name"]== null ? " " : $_POST["rat_name"]  ;

    
    

    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($rating)));
    array_push($insertArray, htmlspecialchars(strip_tags($cus_id)));
    array_push($insertArray, htmlspecialchars(strip_tags($rat_name)));
  
    array_push($insertArray, htmlspecialchars(strip_tags($sho_id)));


    $sql = "insert into rateingshope(rating , cus_id , rat_name , sho_id , rat_regdate )
            values(? , ? , ? , ? , now() )";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
