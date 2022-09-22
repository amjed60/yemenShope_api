<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
if (
    isset($_GET["start"])
    && is_numeric($_GET["start"])
    && isset($_GET["end"])
    && is_numeric($_GET["end"])
    && is_auth()
) {
    $start = $_GET["start"];
    $end = $_GET["end"];
	$sho_id = $_GET["sho_id"];

	$txtsearch = !isset($_GET["txtsearch"])   ? "" : $_GET["txtsearch"]  ;
 	$selectArray = array();
    array_push($selectArray, "%" . htmlspecialchars(strip_tags($txtsearch)) . "%");
	if(trim($txtsearch) != "")
	{
		$sql = "select * from comment where sho_id = ? and  com_name like ? order by com_regdate asc limit $start , $end";
		$result = dbExec($sql, $selectArray);
	}
	else
	{
		$sql = "select * from comment where  sho_id = $sho_id order by com_regdate asc limit $start , $end";
		$result = dbExec($sql, []);
	}
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