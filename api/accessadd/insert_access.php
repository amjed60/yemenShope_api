<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (
    isset($_POST["use_id"])
  
  
) {
	
    $use_id = $_POST["use_id"];
	
    $adduser = isset($_POST["adduser"]) ? $_POST["adduser"] : "0";
    $addshope = isset($_POST["addshope"]) ? $_POST["addshope"] : "0";
    $addmall = isset($_POST["addmall"]) ? $_POST["addmall"] : "0";
    $addtyp_shope = isset($_POST["addtyp_shope"]) ? $_POST["addtyp_shope"] : "0";
    $addtype_sec = isset($_POST["addtype_sec"]) ? $_POST["addtype_sec"] : "0";
    $addcity = isset($_POST["addcity"]) ? $_POST["addcity"] : "0";
    $addstreet = isset($_POST["addstreet"]) ? $_POST["addstreet"] : "0";
    $addcustomer = isset($_POST["addcustomer"]) ? $_POST["addcustomer"] : "0";
    $addcolor = isset($_POST["addcolor"]) ? $_POST["addcolor"] : "0";
    $addsize = isset($_POST["addsize"]) ? $_POST["addsize"] : "0";
    $addnotif = isset($_POST["addnotif"]) ? $_POST["addnotif"] : "0";
    $addactiveUser = isset($_POST["addactiveUser"]) ? $_POST["addactiveUser"] : "0";
    $addactiveShope = isset($_POST["addactiveShope"]) ? $_POST["addactiveShope"] : "0";
    $addactiveProduct = isset($_POST["addactiveProduct"]) ? $_POST["addactiveProduct"] : "0";
    $addactiveCustomer = isset($_POST["addactiveCustomer"]) ? $_POST["addactiveCustomer"] : "0";
    $addAccess = isset($_POST["addAccess"]) ? $_POST["addAccess"] : "0";
	


    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($use_id)));
    array_push($insertArray, htmlspecialchars(strip_tags($adduser)));
    array_push($insertArray, htmlspecialchars(strip_tags($addshope)));
    array_push($insertArray, htmlspecialchars(strip_tags($addmall)));
    array_push($insertArray, htmlspecialchars(strip_tags($addtyp_shope)));
    array_push($insertArray, htmlspecialchars(strip_tags($addtype_sec)));
    array_push($insertArray, htmlspecialchars(strip_tags($addcity)));
    array_push($insertArray, htmlspecialchars(strip_tags($addstreet)));
    array_push($insertArray, htmlspecialchars(strip_tags($addcustomer)));
    array_push($insertArray, htmlspecialchars(strip_tags($addcolor)));
    array_push($insertArray, htmlspecialchars(strip_tags($addsize)));
    array_push($insertArray, htmlspecialchars(strip_tags($addnotif)));
    array_push($insertArray, htmlspecialchars(strip_tags($addactiveUser)));
    array_push($insertArray, htmlspecialchars(strip_tags($addactiveShope)));
    array_push($insertArray, htmlspecialchars(strip_tags($addactiveProduct)));
    array_push($insertArray, htmlspecialchars(strip_tags($addactiveCustomer)));
    array_push($insertArray, htmlspecialchars(strip_tags($addAccess)));
	
	 

    $sql = "insert into accessadd
        (use_id ,adduser,addshope ,addmall,addtyp_shope ,addtype_sec,addcity,addstreet,addcustomer,addcolor,addsize,addnotif,addactiveUser,addactiveShope,addactiveProduct,addactiveCustomer,addAccess)
            values(? ,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? )";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
