<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
if (
  
	 isset($_GET["sho_id"])
	// isset($_GET["cus_id"])
    && isset($_GET["txtsearch"])
	
    && is_auth()
) {
   // $start = $_GET["start"];
    //$end = $_GET["end"];
	$sho_id = $_GET["sho_id"];
	$txtsearch = $_GET["txtsearch"];
	$sqlWhere = "";
	
        $sql="select fav_id from favorite where sho_id=$sho_id and cus_id=$txtsearch"; 

	/*	$sql = "select shope.sho_name from shope inner join favorite on 
		shope.sho_id = favorite.sho_id 
		where cus_id = $cus_id order by fav_id desc limit $start , $end";
	*/
		$result = dbExec($sql, []);
	
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
