<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
if (
   // isset($_GET["sho_id"])
   // && isset($_GET["cus_id"])
    //&&
    is_auth()
) {
   // $sho_id = htmlspecialchars(strip_tags($_GET["sho_id"]));
   // $cus_id = htmlspecialchars(strip_tags($_GET["cus_id"]));
$sho_id = $_GET["sho_id"];
   // $deleteArray = array();
    //array_push($deleteArray, $sho_id);
    $sql = "delete from userFollowshope where sho_id = $sho_id";
    $result = dbExec($sql, []);

    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
