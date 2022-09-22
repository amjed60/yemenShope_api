<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
if (
    isset($_POST["use_id"])
  //  && is_numeric($_POST["use_id"])
    //&& isset($_POST["use_name"])
    //&& isset($_POST["use_pwd"])
    //&& isset($_POST["use_mobile"])
    && is_auth()
) {

    $isaccess = $_POST["isaccess"];
	$use_id = $_POST["use_id"];
    
    

    if(trim($isaccess) != "" )
    {
        $updateArray = array();
        array_push($updateArray, htmlspecialchars(strip_tags($isaccess)));
    array_push($updateArray, htmlspecialchars(strip_tags($use_id)));


    $sql = $sql = "update users set isaccess=?
    where use_id=?";
    $result = dbExec($sql, $updateArray);
    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);

    }
    else if(trim($isaccess) == "" )
    {
    $use_name = $_POST["use_name"];
    $use_pwd = $_POST["use_pwd"];
    $use_mobile = $_POST["use_mobile"];
    $use_active = $_POST["use_active"]; //isset($_POST["use_active"]) ? $_POST["use_active"] : "0";
    $use_not = isset($_POST["use_not"]) ? $_POST["use_not"] : "";
    $use_id = $_POST["use_id"];
    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($use_name)));
    array_push($updateArray, htmlspecialchars(strip_tags($use_pwd)));
    array_push($updateArray, htmlspecialchars(strip_tags($use_mobile)));
    array_push($updateArray, htmlspecialchars(strip_tags($use_active)));
    array_push($updateArray, htmlspecialchars(strip_tags($use_not)));
    array_push($updateArray, htmlspecialchars(strip_tags($use_id)));
        
    
    $sql = "update users 
    set use_name=?,use_pwd=?,use_mobile=?,use_active=?,use_not=?,use_lastdate=now()
    where use_id=?";
    $result = dbExec($sql, $updateArray);
    
    
    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
} else
 {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
