<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["use_id"])
    && is_numeric($_POST["use_id"])
    && isset($_POST["viewAccess"])
    && isset($_POST["viewuser"])
    && isset($_POST["viewshope"])
    && isset($_POST["viewmall"])
    && isset($_POST["viewtyp_shope"])
    && isset($_POST["viewtype_sec"])
    && isset($_POST["viewcity"])
    && isset($_POST["viewstreet"])
    && isset($_POST["viewcustomer"])
    && isset($_POST["viewcolor"])
    && isset($_POST["viewsize"])
    && isset($_POST["viewnotif"])
    && isset($_POST["viewsettingsPage"])
    && isset($_POST["viewactivePage"])
    && isset($_POST["viewactiveUser"])
    && isset($_POST["viewactiveShope"])
    && isset($_POST["viewactiveProduct"])
    && isset($_POST["viewactiveCustomer"])
    && isset($_POST["viewshopePage"])
    && isset($_POST["viewdescount"])
    && isset($_POST["viewactivemall"])
    && isset($_POST["viewactivediscount"])

    

    && is_auth()
) {
    $use_id = $_POST["use_id"];
    $viewAccess = $_POST["viewAccess"];
    $viewuser = $_POST["viewuser"];
    $viewshope = $_POST["viewshope"];
    $viewmall = $_POST["viewmall"];
    $viewtyp_shope = $_POST["viewtyp_shope"];
    $viewtype_sec = $_POST["viewtype_sec"];
    $viewcity = $_POST["viewcity"];
    $viewstreet = $_POST["viewstreet"];
    $viewcustomer = $_POST["viewcustomer"];
    $viewcolor = $_POST["viewcolor"];
    $viewsize = $_POST["viewsize"];
    $viewnotif = $_POST["viewnotif"];
    $viewsettingsPage = $_POST["viewsettingsPage"];
    $viewactivePage = $_POST["viewactivePage"];
    $viewactiveUser = $_POST["viewactiveUser"];
    $viewactiveShope = $_POST["viewactiveShope"];
    $viewactiveProduct = $_POST["viewactiveProduct"];
    $viewactiveCustomer = $_POST["viewactiveCustomer"];
    $viewshopePage = $_POST["viewshopePage"];
    $viewdescount = $_POST["viewdescount"];
    $viewactivemall = $_POST["viewactivemall"];
    $viewactivediscount = $_POST["viewactivediscount"];
    
    
    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($viewAccess)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewuser)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewshope)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewmall)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewtyp_shope)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewtype_sec)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewcity)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewstreet)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewcustomer)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewcolor)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewsize)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewnotif)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewsettingsPage)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewactivePage)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewactiveUser)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewactiveShope)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewactiveProduct)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewactiveCustomer)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewshopePage)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewdescount)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewactivemall)));
    array_push($updateArray, htmlspecialchars(strip_tags($viewactivediscount)));
    
    
    array_push($updateArray, htmlspecialchars(strip_tags($use_id)));
    
	
		$sql = "update accessview set viewAccess=?,viewuser=? ,viewshope=?,viewmall=? ,viewtyp_shope=?,viewtype_sec=?,viewcity=?,viewstreet=?,viewcustomer=?,viewcolor=?,viewsize=?,viewnotif=?,viewsettingsPage=?,viewactivePage=?,viewactiveUser=?,viewactiveShope=?,viewactiveProduct=?,viewactiveCustomer=?,viewshopePage=?,viewdescount=?,viewactivemall=?,viewactivediscount=?
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