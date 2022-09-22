<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (isset($_POST["dis_name"])
  
	&& is_auth()
  
) {
  
     $dis_name = $_POST["dis_name"];
    $dis_price = $_POST["dis_price"];
	$dis_offer = $_POST["dis_offer"];
	
    $dis_note = $_POST["dis_note"];
	$sho_id = $_POST["sho_id"];
	$isShope = $_POST["isShope"];
	
	
	if (!empty($_FILES["file"]['name']) )
	{
		$images = uploadImage("file" , '../../images/discount/' , 200 , 600);
		$img_image = $images["image"];
		$img_thumbnail = $images["thumbnail"];
    
	}
	else
	{
		$img_image = "";
		$img_thumbnail = "";
	}
    $tomorrow = date_create('+2 day')->format('Y-m-d H:i:s');

    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($dis_name)));
    array_push($insertArray, htmlspecialchars(strip_tags($dis_price)));
	array_push($insertArray, htmlspecialchars(strip_tags($dis_offer)));
	array_push($insertArray, htmlspecialchars(strip_tags($dis_note)));
    array_push($insertArray, htmlspecialchars(strip_tags($sho_id)));
    array_push($insertArray, htmlspecialchars(strip_tags($isShope)));
    
    array_push($insertArray, htmlspecialchars(strip_tags($tomorrow)));

	  array_push($insertArray, htmlspecialchars(strip_tags($img_image)));
    array_push($insertArray, htmlspecialchars(strip_tags($img_thumbnail)));
   // $now = (new DateTime('now'))->format('Y-m-d H:i:s');
 //,dis_start_date ,dis_end_date,dis_note,sho_id,ismall,mal_id,img_image , i    mg_thumbnail)

    $sql = "insert into discounts
        (dis_name , dis_price ,dis_offer ,dis_note,sho_id,isShope,dis_start_date,dis_end_date,dis_image , dis_thumbnail)
            values(?,? ,?,?,?,?,now(),?,?,?)";	
    $result = dbExec($sql, $insertArray);
	
	
    $readArray = array();
	
    array_push($readArray, htmlspecialchars(strip_tags($dis_offer)));
	
    $sql = "select * from customer where dis_offer = ?  order by dis_id desc limit 0,1";
    $result = dbExec($sql, $readArray);
    $arrJson = array();
    if ($result->rowCount() > 0) {
        $arrJson  = $result->fetch();
	}

    $resJson = array("result" => "success", "code" => "200", "message" => $arrJson);
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
