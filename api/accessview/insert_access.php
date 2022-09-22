<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (
    isset($_POST["use_id"])
  
  
) {
	
    $use_id = $_POST["use_id"];
	
    $viewAccess = isset($_POST["viewAccess"]) ? $_POST["viewAccess"] : "0";
    $viewuser = isset($_POST["viewuser"]) ? $_POST["viewuser"] : "0";
    $viewshope = isset($_POST["viewshope"]) ? $_POST["viewshope"] : "0";
    $viewmall = isset($_POST["viewmall"]) ? $_POST["viewmall"] : "0";
    $viewtyp_shope = isset($_POST["viewtyp_shope"]) ? $_POST["viewtyp_shope"] : "0";
    $viewtype_sec = isset($_POST["viewtype_sec"]) ? $_POST["viewtype_sec"] : "0";
    $viewcity = isset($_POST["viewcity"]) ? $_POST["viewcity"] : "0";
    $viewstreet = isset($_POST["viewstreet"]) ? $_POST["viewstreet"] : "0";
    $viewcustomer = isset($_POST["viewcustomer"]) ? $_POST["viewcustomer"] : "0";
    $viewcolor = isset($_POST["viewcolor"]) ? $_POST["viewcolor"] : "0";
    $viewsize = isset($_POST["viewsize"]) ? $_POST["viewsize"] : "0";
    $viewnotif = isset($_POST["viewnotif"]) ? $_POST["viewnotif"] : "0";
    $viewsettingsPage = isset($_POST["viewsettingsPage"]) ? $_POST["viewsettingsPage"] : "0";
    $viewactivePage = isset($_POST["viewactivePage"]) ? $_POST["viewactivePage"] : "0";
    $viewactiveUser = isset($_POST["viewactiveUser"]) ? $_POST["viewactiveUser"] : "0";
    $viewactiveShope = isset($_POST["viewactiveShope"]) ? $_POST["viewactiveShope"] : "0";
    $viewactiveProduct = isset($_POST["viewactiveProduct"]) ? $_POST["viewactiveProduct"] : "0";
    $viewactiveCustomer = isset($_POST["viewactiveCustomer"]) ? $_POST["viewactiveCustomer"] : "0";
    $viewshopePage = isset($_POST["viewshopePage"]) ? $_POST["viewshopePage"] : "0";
	


    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($use_id)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewAccess)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewuser)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewshope)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewmall)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewtyp_shope)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewtype_sec)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewcity)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewstreet)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewcustomer)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewcolor)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewsize)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewnotif)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewsettingsPage)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewactivePage)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewactiveUser)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewactiveShope)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewactiveProduct)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewactiveCustomer)));
    array_push($insertArray, htmlspecialchars(strip_tags($viewshopePage)));
	
	 

    $sql = "insert into accessview
        (use_id ,viewAccess,viewuser ,viewshope,viewmall ,viewtyp_shope,viewtype_sec,viewcity,viewstreet,
        viewcustomer,viewcolor,viewsize,viewnotif,viewsettingsPage,viewactivePage,viewactiveUser,
        viewactiveShope,viewactiveProduct,viewactiveCustomer,viewshopePage)
            values(? ,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,?,?,?)";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
