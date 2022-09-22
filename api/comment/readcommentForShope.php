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
/*
    $sql="select t1.com_id,t1.com_name,t1.com_regdate,
    t2.cus_thumbnail,t2.cus_name ,
   // t3.price as baylevelPrice ,t3.isbay,t3.bay_date,t3.bay_id
    from comment as t1
    LEFT JOIN customer as t2
    ON t1.cus_id=t2.cus_id
   // LEFT JOIN baylevel as t3
   // ON t1.id_lev=t3.id_lev and t2.tra_id=t3.tra_id
    where t1.cus_id=?  order by t1.com_id asc ";

		$sql = "select * from comment where  sho_id = $sho_id order by com_regdate asc limit $start , $end";
		*/
        $sql="select t1.com_id,t1.com_name,t1.com_regdate,t2.cus_thumbnail,t2.cus_name ,t2.cus_id
         from comment as t1
        LEFT JOIN customer as t2
        ON t1.cus_id=t2.cus_id
        where t1.sho_id=$sho_id order by t1.com_id asc limit $start , $end";
    

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
