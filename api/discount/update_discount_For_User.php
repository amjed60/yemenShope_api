<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["dis_id"])
    && is_numeric($_POST["dis_id"])
    && isset($_POST["dis_name"])
	
    
    && is_auth()
) {
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

	
    $dis_name = $_POST["dis_name"];
    $dis_offer = $_POST["dis_offer"];
	$dis_price = $_POST["dis_price"];
	$dis_note = $_POST["dis_note"] == null ? "" : $_POST["dis_note"]  ;

    $dis_id = $_POST["dis_id"];

    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($dis_name)));
    array_push($updateArray, htmlspecialchars(strip_tags($dis_offer)));
	array_push($updateArray, htmlspecialchars(strip_tags($dis_price)));
    array_push($updateArray, htmlspecialchars(strip_tags($dis_note)));




	if($img_image != "")
	{
		array_push($updateArray, htmlspecialchars(strip_tags($img_image)));
		array_push($updateArray, htmlspecialchars(strip_tags($img_thumbnail)));
	}
    array_push($updateArray, htmlspecialchars(strip_tags($dis_id)));

	if($img_image != "")
	{
		$sql = "update discounts set dis_name=?,dis_offer=?,dis_price=?,dis_note=?
	       img_image = ? , img_thumbnail = ? 
		   where dis_id=?";
	}
	else
	{
			$sql = "update discounts set dis_name=?,dis_offer=?,dis_price=?,dis_note=?
            		where dis_id=?";
	}
    $result = dbExec($sql, $updateArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
