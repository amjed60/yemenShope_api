<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
if (
    isset($_GET["start"])
    && is_numeric($_GET["start"])
    && isset($_GET["end"])
    && is_numeric($_GET["end"])
	
	//&& is_numeric($_GET["cat_id"])
    && is_auth()
) {
    $start = $_GET["start"];
    $end = $_GET["end"];
   $tomorrow = date_create('+0 day')->format('Y-m-d H:i:s');
   $date_now= date("Y-m-d H:i:s");    

 	$isShope = !isset($_GET["isShope"])   ? "" : $_GET["isShope"]  ;
 
	$sho_id = !isset($_GET["sho_id"])   ? "" : $_GET["sho_id"]  ;
	$txtsearch = !isset($_GET["txtsearch"])   ? "" : $_GET["txtsearch"]  ;
 	$selectArray = array();

    array_push($selectArray, "%" . htmlspecialchars(strip_tags($txtsearch)) . "%");
	if(trim($isShope) != "")
	{
		$sql = "select * from discounts where isShope = $isShope and dis_end_date >= '$date_now' order by dis_id asc limit $start , $end";
		$result = dbExec($sql, $selectArray);
	}
    else if(trim($txtsearch) == ""&&trim($sho_id) == "")
    {
        $sql = "select * from discounts order by dis_id asc limit $start , $end";
        $result = dbExec($sql, []);
        
    }
    else if(trim($txtsearch) == ""&&trim($sho_id) != "")
	{
        $sql = "select * from discounts where sho_id = $sho_id and dis_end_date >= '$date_now' order by dis_id asc limit $start , $end";
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
