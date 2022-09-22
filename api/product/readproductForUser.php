<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
if (
   // isset($_GET["start"])
    //&& is_numeric($_GET["start"])
   // && isset($_GET["end"])
   // && is_numeric($_GET["end"])
	 isset($_GET["sho_id"])
//	&& is_numeric($_GET["sho_id"])
    && 
    is_auth()
) {
    $start = $_GET["start"];
    $end = $_GET["end"];
	$sho_id = $_GET["sho_id"];
	
	$txtsearch = !isset($_GET["txtsearch"])   ? "" : $_GET["txtsearch"]  ;
 	$selectArray = array();
	array_push($selectArray,  htmlspecialchars(strip_tags($sho_id)));
    array_push($selectArray, "%" . htmlspecialchars(strip_tags($txtsearch)) . "%");
	if(trim($txtsearch) != "")
	{
		$sql = "select pro_id,pro_name,pro_name_en,sho_id,pro_new_price,pro_offer,pro_info,pro_state,pro_image,pro_color,pro_size,pro_not,pro_old_price,sec_id from product where  sho_id = ? and pro_name like ? order by pro_id asc limit $start , $end";
		$result = dbExec($sql, $selectArray);
	}
	else
	{
		$sql = "select pro_id,pro_name,pro_name_en,sho_id,pro_new_price,pro_offer,pro_info,pro_state,pro_image,pro_color,pro_size,pro_not,pro_old_price,sec_id from product where  sho_id = $sho_id order by pro_id asc limit $start , $end";
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
