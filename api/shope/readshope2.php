<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
if (
    isset($_GET["start"])
    && is_numeric($_GET["start"])
    && isset($_GET["end"])
    && is_numeric($_GET["end"])
    && isset($_GET["ismall"])
    && is_auth()
) {
    $start = $_GET["start"];
    $end = $_GET["end"];
	$txtsearch = !isset($_GET["txtsearch"])   ? "" : $_GET["txtsearch"]  ;
    $str_id = !isset($_GET["str_id"])   ? "" : $_GET["str_id"]  ;
	$ismall = $_GET["ismall"];

 	$selectArray = array();
	array_push($selectArray,  htmlspecialchars(strip_tags($ismall)));

    array_push($selectArray, "%" . htmlspecialchars(strip_tags($txtsearch)) . "%");
	if(trim($txtsearch) != "")
	{
		$sql = "select * from shope where  ismall = ? and sho_name like ? order by sho_id asc";
		$result = dbExec($sql, $selectArray);
	}
    else if(trim($str_id) != "")
    {
        $sql = "select * from shope where  ismall = ? and str_id = $str_id order by sho_id asc";
		$result = dbExec($sql, $selectArray);
    }
	else
	{
		$sql = "select * from shope where ismall = $ismall order by isactive asc";
		$result = dbExec($sql, []);
	}// and isactive!=1
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
