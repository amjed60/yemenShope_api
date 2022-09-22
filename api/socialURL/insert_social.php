<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (
    isset($_POST["sho_id"])
    && is_auth()
) {
	
    $su_whats = $_POST["su_whats"];
    $su_link = $_POST["su_link"];
    $su_face = $_POST["su_face"];
    $su_twa = $_POST["su_twa"];
    $su_telg = $_POST["su_telg"];
    $su_web = $_POST["su_web"];
    $su_inst = $_POST["su_inst"];
    $su_github = $_POST["su_github"];
    $su_email = $_POST["su_email"];
    $su_phon = $_POST["su_phon"];
    $su_phone2 = $_POST["su_phone2"];
    $sho_id = $_POST["sho_id"];
   
    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($su_whats)));
    array_push($insertArray, htmlspecialchars(strip_tags($su_link)));
    array_push($insertArray, htmlspecialchars(strip_tags($su_face)));
    array_push($insertArray, htmlspecialchars(strip_tags($su_twa)));
    array_push($insertArray, htmlspecialchars(strip_tags($su_telg)));
    array_push($insertArray, htmlspecialchars(strip_tags($su_web)));
    array_push($insertArray, htmlspecialchars(strip_tags($su_inst)));
    array_push($insertArray, htmlspecialchars(strip_tags($su_github)));
    array_push($insertArray, htmlspecialchars(strip_tags($su_email)));
    array_push($insertArray, htmlspecialchars(strip_tags($su_phon)));
    array_push($insertArray, htmlspecialchars(strip_tags($su_phone2)));
    array_push($insertArray, htmlspecialchars(strip_tags($sho_id)));
    $sql = "insert into socialURL
        (su_whats,su_link,su_face ,su_twa,su_telg,su_web,su_inst,su_github,su_email,su_phon,su_phone2,sho_id)
            values(?,?,?,?,?,?,?,?,?,?,?,?)";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
