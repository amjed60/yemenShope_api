<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (
    isset($_POST["use_id"])
  
  
) {
	
    $use_id = $_POST["use_id"];
	
    $deluser = isset($_POST["deluser"]) ? $_POST["deluser"] : "0";
    $delshope = isset($_POST["delshope"]) ? $_POST["delshope"] : "0";
    $delmall = isset($_POST["delmall"]) ? $_POST["delmall"] : "0";
    $deltyp_shope = isset($_POST["deltyp_shope"]) ? $_POST["deltyp_shope"] : "0";
    $deltype_sec = isset($_POST["deltype_sec"]) ? $_POST["deltype_sec"] : "0";
    $delcity = isset($_POST["delcity"]) ? $_POST["delcity"] : "0";
    $delstreet = isset($_POST["delstreet"]) ? $_POST["delstreet"] : "0";
    $delcustomer = isset($_POST["delcustomer"]) ? $_POST["delcustomer"] : "0";
    $delcolor = isset($_POST["delcolor"]) ? $_POST["delcolor"] : "0";
    $delsize = isset($_POST["delsize"]) ? $_POST["delsize"] : "0";
   // $delnotif = isset($_POST["delnotif"]) ? $_POST["delnotif"] : "0";
    $delnotif = $_POST["delnotif"];

    $delactiveUser = isset($_POST["delactiveUser"]) ? $_POST["delactiveUser"] : "0";
    $delactiveShope = isset($_POST["delactiveShope"]) ? $_POST["delactiveShope"] : "0";
    $delactiveProduct = isset($_POST["delactiveProduct"]) ? $_POST["delactiveProduct"] : "0";
    $delactiveCustomer = isset($_POST["delactiveCustomer"]) ? $_POST["delactiveCustomer"] : "0";
	


    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($use_id)));
    array_push($insertArray, htmlspecialchars(strip_tags($deluser)));
    array_push($insertArray, htmlspecialchars(strip_tags($delshope)));
    array_push($insertArray, htmlspecialchars(strip_tags($delmall)));
    array_push($insertArray, htmlspecialchars(strip_tags($deltyp_shope)));
    array_push($insertArray, htmlspecialchars(strip_tags($deltype_sec)));
    array_push($insertArray, htmlspecialchars(strip_tags($delcity)));
    array_push($insertArray, htmlspecialchars(strip_tags($delstreet)));
    array_push($insertArray, htmlspecialchars(strip_tags($delcustomer)));
    array_push($insertArray, htmlspecialchars(strip_tags($delcolor)));
    array_push($insertArray, htmlspecialchars(strip_tags($delsize)));
    array_push($insertArray, htmlspecialchars(strip_tags($delnotif)));
    array_push($insertArray, htmlspecialchars(strip_tags($delactiveUser)));
    array_push($insertArray, htmlspecialchars(strip_tags($delactiveShope)));
    array_push($insertArray, htmlspecialchars(strip_tags($delactiveProduct)));
    array_push($insertArray, htmlspecialchars(strip_tags($delactiveCustomer)));
	
	 

    $sql = "insert into accessdel
        (use_id ,deluser,delshope ,delmall,deltyp_shope ,deltype_sec,delcity,delstreet,delcustomer,delcolor,delsize,delnotif,delactiveUser,delactiveShope,delactiveProduct,delactiveCustomer)
            values(? ,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? )";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
