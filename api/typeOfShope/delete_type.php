<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
if (
    isset($_GET["typ_id"])
    && is_numeric($_GET["typ_id"])
    && is_auth()
) {
    $typ_id = htmlspecialchars(strip_tags($_GET["typ_id"]));

    $deleteArray = array();
    array_push($deleteArray, $typ_id);
    $sql = "delete from typeofshope where typ_id = ?";
    $result = dbExec($sql, $deleteArray);

    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
