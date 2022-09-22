<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
if (
    isset($_GET["start"])
    && is_numeric($_GET["start"])
    && isset($_GET["end"])
    && is_numeric($_GET["end"])
  //  && isset($_GET["use_id"])

    && is_auth()
) {
    $start = $_GET["start"];
    $end = $_GET["end"];
	$txtsearch = $_GET["txtsearch"];
	//$isaccess = $_GET["isaccess"];
    
    $isaccess = isset($_GET["isaccess"]) ? $_GET["isaccess"] : "3";

 	$selectArray = array();
    array_push($selectArray, "%" . htmlspecialchars(strip_tags($txtsearch)) . "%");
	if(trim($txtsearch) != "")//&&trim($use_id) != "")
	{
		$sql = "select * from users where use_name like ? order by use_name asc limit $start , $end";
		$result = dbExec($sql, $selectArray);
	}
    
	else if(trim($isaccess) == "0"||trim($isaccess) == "1" )
	{
		$sql = "select * from users where isaccess = $isaccess order by use_id asc limit $start , $end";
		$result = dbExec($sql, []);
	}
    
    
    else if( trim($txtsearch)==""&&trim($isaccess) == "3")//trim($use_id) != "" )//&&
	{
		$sql = "select * from users order by use_name asc limit $start , $end";
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
