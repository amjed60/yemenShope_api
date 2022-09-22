<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
if (
    isset($_GET["start"])
    && is_numeric($_GET["start"])
    && isset($_GET["end"])
    && is_numeric($_GET["end"])
	 && isset($_GET["cus_id"])
    && is_numeric($_GET["cus_id"])
	
    && is_auth()
) {
    $start = $_GET["start"];
    $end = $_GET["end"];
	$cus_id = $_GET["cus_id"];
	$sqlWhere = "";
	
	$txtsearch = !isset($_GET["txtsearch"])   ? "" : $_GET["txtsearch"]  ;
 	$selectArray = array();
	
    array_push($selectArray, "%" . htmlspecialchars(strip_tags($txtsearch)) . "%");
	if(trim($txtsearch) != "")
	{
		$sql="select s1.sho_name,s1.sho_address,s1.sho_mobile,s1.sho_id,s1.sho_image,
        p3.fav_regdate ,p3.fav_id
         from shope as s1
         LEFT JOIN favorite as p3
         ON s1.sho_id=p3.sho_id
         where p3.cus_id=$cus_id and sho_name like ? order by fav_id desc limit $start , $end"; 
		$result = dbExec($sql, $selectArray);
	}
	else
	{
	$sql="select p.pro_name,p.pro_new_price,p.pro_image,p.pro_id,p.sec_id,
        s.sho_id,s.sho_name,s.sho_mobile,s.sho_address,
        p3.fav_regdate ,p3.fav_id
        from product as p
        LEFT JOIN favorite as p3
        ON p.pro_id=p3.pro_id 
         LEFT JOIN shope as s
        ON s.sho_id=p3.sho_id 
        where p3.cus_id=$cus_id order by fav_id desc limit $start , $end"; 
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
