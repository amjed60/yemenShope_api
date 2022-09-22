<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (
    isset($_POST["det_PacName"])
    &&isset($_POST["ty_pacID"])
    &&isset($_POST["Active"])
  
  
) {
	
    $det_PacName = $_POST["det_PacName"];
    $ty_pacID = $_POST["ty_pacID"];
    $Active = $_POST["Active"];
   
	
	


    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($det_PacName)));
    array_push($insertArray, htmlspecialchars(strip_tags($ty_pacID)));
    array_push($insertArray, htmlspecialchars(strip_tags($Active)));
	
	 

    $sql = "insert into DetalisPackage
        (det_PacName,ty_pacID ,Active  )
            values(? ,?,? )";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
