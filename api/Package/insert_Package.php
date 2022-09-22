<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (
    isset($_POST["ty_pacName"])
   && isset($_POST["ty_pacPrice"])
    &&isset($_POST["ty_pacDiscount"])
    &&isset($_POST["ty_pacNumberProduct"])
    && is_auth()
  
) {
	
    $ty_pacName = $_POST["ty_pacName"];
    $ty_pacPrice = $_POST["ty_pacPrice"];
    $ty_pacDiscount = $_POST["ty_pacDiscount"];
    $ty_pacNumberProduct = $_POST["ty_pacNumberProduct"];
   
	
	


    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($ty_pacName)));
    array_push($insertArray, htmlspecialchars(strip_tags($ty_pacPrice)));
    array_push($insertArray, htmlspecialchars(strip_tags($ty_pacDiscount)));
    array_push($insertArray, htmlspecialchars(strip_tags($ty_pacNumberProduct)));
	
	 

    $sql = "insert into Type_Package
        (ty_pacName ,ty_pacPrice,ty_pacDiscount,ty_pacNumberProduct  )
            values(? ,?,?,? )";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
