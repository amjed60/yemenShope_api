<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
/*$images = uploadCustomerImage("file", '../../images/customer/' , 400 , 600 );
	$img_image = $images['image'];
	$img_thumbnail  = $images['thumbnail'];*/
if (
    isset($_POST["use_name"])
    && isset($_POST["use_pwd"])
    && isset($_POST["use_mobile"])
    && is_auth()
) {
    $use_name = $_POST["use_name"];
    $use_mobile = $_POST["use_mobile"];
    $use_pwd = $_POST["use_pwd"];
    $use_active = isset($_POST["use_active"]) ? $_POST["use_active"] : "0";
    $use_not = isset($_POST["use_not"]) ? $_POST["use_not"] : "";
    $cit_id = $_POST["cit_id"]? $_POST["cit_id"] : "لاتوجد مدينة";


    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($use_name)));
    array_push($insertArray, htmlspecialchars(strip_tags($use_mobile)));
    array_push($insertArray, htmlspecialchars(strip_tags($use_pwd)));
    array_push($insertArray, htmlspecialchars(strip_tags($use_active)));
    array_push($insertArray, htmlspecialchars(strip_tags($use_not)));
    array_push($insertArray, htmlspecialchars(strip_tags($cit_id)));

    $sql = "insert into users(use_name , use_mobile ,use_pwd , use_active , use_not ,cit_id, use_datetime , use_lastdate)
            values(? , ? , ? , ? ,? ,?, now() , now())";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
