<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["use_id"])
    && is_numeric($_POST["use_id"])
    && isset($_POST["deluser"])
    && isset($_POST["delshope"])
    && isset($_POST["delmall"])
    && isset($_POST["deltyp_shope"])
    && isset($_POST["deltype_sec"])
    && isset($_POST["delcity"])
    && isset($_POST["delstreet"])
    && isset($_POST["delcustomer"])
    && isset($_POST["delcolor"])
    && isset($_POST["delsize"])
    && isset($_POST["delnotif"])
   && is_auth()
) {
    $use_id = $_POST["use_id"];
    //$acc_id = $_POST["acc_id"];

    
    $deluser = $_POST["deluser"];
    $delshope = $_POST["delshope"];
    $delmall = $_POST["delmall"];
    $deltyp_shope = $_POST["deltyp_shope"];
    $deltype_sec = $_POST["deltype_sec"];
    $delcity = $_POST["delcity"];
    $delstreet = $_POST["delstreet"];
    $delcustomer = $_POST["delcustomer"];
    $delcolor = $_POST["delcolor"];
    $delsize = $_POST["delsize"];
    $delnotif = $_POST["delnotif"];
   
    
    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($deluser)));
    array_push($updateArray, htmlspecialchars(strip_tags($delshope)));
    array_push($updateArray, htmlspecialchars(strip_tags($delmall)));
    array_push($updateArray, htmlspecialchars(strip_tags($deltyp_shope)));
    array_push($updateArray, htmlspecialchars(strip_tags($deltype_sec)));
    array_push($updateArray, htmlspecialchars(strip_tags($delcity)));
    array_push($updateArray, htmlspecialchars(strip_tags($delstreet)));
    array_push($updateArray, htmlspecialchars(strip_tags($delcustomer)));
    array_push($updateArray, htmlspecialchars(strip_tags($delcolor)));
    array_push($updateArray, htmlspecialchars(strip_tags($delsize)));
    array_push($updateArray, htmlspecialchars(strip_tags($delnotif)));
    array_push($updateArray, htmlspecialchars(strip_tags($use_id)));
    
	
    $sql = "update accessdel set deluser=?,delshope=? ,delmall=?,deltyp_shope=? ,deltype_sec=?,delcity=?,delstreet=?,delcustomer=?,delcolor=?,delsize=?,delnotif=?
             where use_id=?";
	
    $result = dbExec($sql, $updateArray);

    
    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}

/*	
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
    */