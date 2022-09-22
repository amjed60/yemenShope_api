<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["use_id"])
    && is_numeric($_POST["use_id"])
    && isset($_POST["edituser"])
    && isset($_POST["editshope"])
    && isset($_POST["editmall"])
    && isset($_POST["edittyp_shope"])
    && isset($_POST["edittype_sec"])
    && isset($_POST["editcity"])
    && isset($_POST["editstreet"])
    && isset($_POST["editcustomer"])
    && isset($_POST["editcolor"])
    && isset($_POST["editsize"])
    && isset($_POST["editactiveUser"])
    && isset($_POST["editactiveShope"])
    && isset($_POST["editactiveProduct"])
    && isset($_POST["editactiveCustomer"])
    && isset($_POST["editAccess"])

    && is_auth()
) {
    $use_id = $_POST["use_id"];
    $edituser = $_POST["edituser"];
    $editshope = $_POST["editshope"];
    $editmall = $_POST["editmall"];
    $edittyp_shope = $_POST["edittyp_shope"];
    $edittype_sec = $_POST["edittype_sec"];
    $editcity = $_POST["editcity"];
    $editstreet = $_POST["editstreet"];
    $editcustomer = $_POST["editcustomer"];
    $editcolor = $_POST["editcolor"];
    $editsize = $_POST["editsize"];
    $editnotif = $_POST["editnotif"];
    $editactiveUser = $_POST["editactiveUser"];
    $editactiveShope = $_POST["editactiveShope"];
    $editactiveProduct = $_POST["editactiveProduct"];
    $editactiveCustomer = $_POST["editactiveCustomer"];
    $editAccess = $_POST["editAccess"];
    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($edituser)));
    array_push($updateArray, htmlspecialchars(strip_tags($editshope)));
    array_push($updateArray, htmlspecialchars(strip_tags($editmall)));
    array_push($updateArray, htmlspecialchars(strip_tags($edittyp_shope)));
    array_push($updateArray, htmlspecialchars(strip_tags($edittype_sec)));
    array_push($updateArray, htmlspecialchars(strip_tags($editcity)));
    array_push($updateArray, htmlspecialchars(strip_tags($editstreet)));
    array_push($updateArray, htmlspecialchars(strip_tags($editcustomer)));
    array_push($updateArray, htmlspecialchars(strip_tags($editcolor)));
    array_push($updateArray, htmlspecialchars(strip_tags($editsize)));
    array_push($updateArray, htmlspecialchars(strip_tags($editnotif)));
    array_push($updateArray, htmlspecialchars(strip_tags($editactiveUser)));
    array_push($updateArray, htmlspecialchars(strip_tags($editactiveShope)));
    array_push($updateArray, htmlspecialchars(strip_tags($editactiveProduct)));
    array_push($updateArray, htmlspecialchars(strip_tags($editactiveCustomer)));
    array_push($updateArray, htmlspecialchars(strip_tags($editAccess)));
    array_push($updateArray, htmlspecialchars(strip_tags($use_id)));
    
	
		$sql = "update accessedit set edituser=?,editshope=? ,editmall=?,edittyp_shope=? ,edittype_sec=?,editcity=?,editstreet=?,editcustomer=?,editcolor=?,editsize=?,editnotif=?,editactiveUser=?,editactiveShope=?,editactiveProduct=?,editactiveCustomer=?,editAccess=?
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
    $edituser = isset($_POST["edituser"]) ? $_POST["edituser"] : "0";
    $editshope = isset($_POST["editshope"]) ? $_POST["editshope"] : "0";
    $editmall = isset($_POST["editmall"]) ? $_POST["editmall"] : "0";
    $edittyp_shope = isset($_POST["edittyp_shope"]) ? $_POST["edittyp_shope"] : "0";
    $edittype_sec = isset($_POST["edittype_sec"]) ? $_POST["edittype_sec"] : "0";
    $editcity = isset($_POST["editcity"]) ? $_POST["editcity"] : "0";
    $editstreet = isset($_POST["editstreet"]) ? $_POST["editstreet"] : "0";
    $editcustomer = isset($_POST["editcustomer"]) ? $_POST["editcustomer"] : "0";
    $editcolor = isset($_POST["editcolor"]) ? $_POST["editcolor"] : "0";
    $editsize = isset($_POST["editsize"]) ? $_POST["editsize"] : "0";
    $editnotif = isset($_POST["editnotif"]) ? $_POST["editnotif"] : "0";
    $editactiveUser = isset($_POST["editactiveUser"]) ? $_POST["editactiveUser"] : "0";
    $editactiveShope = isset($_POST["editactiveShope"]) ? $_POST["editactiveShope"] : "0";
    $editactiveProduct = isset($_POST["editactiveProduct"]) ? $_POST["editactiveProduct"] : "0";
    $editactiveCustomer = isset($_POST["editactiveCustomer"]) ? $_POST["editactiveCustomer"] : "0";
    $editAccess = isset($_POST["editAccess"]) ? $_POST["editAccess"] : "0";
    */