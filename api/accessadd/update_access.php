<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["use_id"])
    && is_numeric($_POST["use_id"])
    && isset($_POST["adduser"])
    && isset($_POST["addshope"])
    && isset($_POST["addmall"])
    && isset($_POST["addtyp_shope"])
    && isset($_POST["addtype_sec"])
    && isset($_POST["addcity"])
    && isset($_POST["addstreet"])
    && isset($_POST["addcustomer"])
    && isset($_POST["addcolor"])
    && isset($_POST["addsize"])
 
    
    && is_auth()
) {
    $use_id = $_POST["use_id"];
    //$acc_id = $_POST["acc_id"];

    
    $adduser = $_POST["adduser"];
    $addshope = $_POST["addshope"];
    $addmall = $_POST["addmall"];
    $addtyp_shope = $_POST["addtyp_shope"];
    $addtype_sec = $_POST["addtype_sec"];
    $addcity = $_POST["addcity"];
    $addstreet = $_POST["addstreet"];
    $addcustomer = $_POST["addcustomer"];
    $addcolor = $_POST["addcolor"];
    $addsize = $_POST["addsize"];
    $addnotif = $_POST["addnotif"];
    $addactiveUser = $_POST["addactiveUser"];
    $addactiveShope = $_POST["addactiveShope"];
    $addactiveProduct = $_POST["addactiveProduct"];
    $addactiveCustomer = $_POST["addactiveCustomer"];
    $addAccess = $_POST["addAccess"];
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
    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($adduser)));
    array_push($updateArray, htmlspecialchars(strip_tags($addshope)));
    array_push($updateArray, htmlspecialchars(strip_tags($addmall)));
    array_push($updateArray, htmlspecialchars(strip_tags($addtyp_shope)));
    array_push($updateArray, htmlspecialchars(strip_tags($addtype_sec)));
    array_push($updateArray, htmlspecialchars(strip_tags($addcity)));
    array_push($updateArray, htmlspecialchars(strip_tags($addstreet)));
    array_push($updateArray, htmlspecialchars(strip_tags($addcustomer)));
    array_push($updateArray, htmlspecialchars(strip_tags($addcolor)));
    array_push($updateArray, htmlspecialchars(strip_tags($addsize)));
    array_push($updateArray, htmlspecialchars(strip_tags($addnotif)));
    array_push($updateArray, htmlspecialchars(strip_tags($addactiveUser)));
    array_push($updateArray, htmlspecialchars(strip_tags($addactiveShope)));
    array_push($updateArray, htmlspecialchars(strip_tags($addactiveProduct)));
    array_push($updateArray, htmlspecialchars(strip_tags($addactiveCustomer)));
    array_push($updateArray, htmlspecialchars(strip_tags($addAccess)));
    array_push($updateArray, htmlspecialchars(strip_tags($use_id)));

	
		$sql = "update accessadd set adduser=?,addshope=? ,addmall=?,addtyp_shope=? ,	addtype_sec=?,addcity=?,	addstreet=?,addcustomer=?,addcolor=?,addsize=?,addnotif=?,addactiveUser=?,addactiveShope=?,addactiveProduct=?,addactiveCustomer=?,addAccess=?
            where use_id=?";
	
    $result = dbExec($sql, $updateArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
