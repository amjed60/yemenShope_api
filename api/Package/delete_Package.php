<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
if (
    isset($_GET["ty_pacID"])
    && is_numeric($_GET["ty_pacID"])
    && is_auth()
) {
    $ty_pacID = htmlspecialchars(strip_tags($_GET["ty_pacID"]));

    $deleteArray = array();
    array_push($deleteArray, $ty_pacID);
    $sql = "delete from Type_Package where ty_pacID = ?";
    $result = dbExec($sql, $deleteArray);

    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
