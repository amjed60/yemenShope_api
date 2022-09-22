<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (
    isset($_POST["cus_id"])&&
    isset($_POST["reptyp_id"])&&
    isset($_POST["sho_id"])

) {
    $rep_name = $_POST["rep_name"]== null ? " " : $_POST["rep_name"]  ;
    $com_id = $_POST["com_id"]== null ? "0" : $_POST["com_id"]  ;	
    $cus_id = $_POST["cus_id"];
    $sho_id = $_POST["sho_id"];
    $reptyp_id = $_POST["reptyp_id"];

    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($rep_name)));
    array_push($insertArray, htmlspecialchars(strip_tags($cus_id)));
    array_push($insertArray, htmlspecialchars(strip_tags($com_id)));
    array_push($insertArray, htmlspecialchars(strip_tags($sho_id)));
    array_push($insertArray, htmlspecialchars(strip_tags($reptyp_id)));
	
	 

    $sql = "insert into report
        (rep_name,cus_id ,com_id ,sho_id ,reptyp_id,rep_regdate)
            values(? ,? ,? ,? ,?,now())";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
