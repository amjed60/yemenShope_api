<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
if (
    isset($_GET["det_PacID"])
    && is_numeric($_GET["det_PacID"])
    && is_auth()
) {
    $det_PacID = htmlspecialchars(strip_tags($_GET["det_PacID"]));

    $deleteArray = array();
    array_push($deleteArray, $det_PacID);
    $sql = "delete from DetalisPackage where det_PacID = ?";
    $result = dbExec($sql, $deleteArray);

    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
