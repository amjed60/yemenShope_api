<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
if (
   
     isset($_GET["sho_id"])
    && is_auth()
) {
    
	
	$sho_id = $_GET["sho_id"];

 	$selectArray = array();
	array_push($selectArray,  htmlspecialchars(strip_tags($sho_id)));

	
        $sql = "select sho_name,sho_id from shope where  sho_id = ? ";
		$result = dbExec($sql, $selectArray);
   
    $arrJson = array();
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            // extract($row);
            $arrJson[] = $row;
        }
    }
    $resJson = array("result" => "success", "code" => "200", "message" => $arrJson);
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
