<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["sho_id"])
    && is_numeric($_POST["sho_id"])
    && isset($_POST["sho_name"])
    && isset($_POST["sho_address"])
    
    && is_auth()
) {
		if (!empty($_FILES["file"]['name']) )
	{
		$images = uploadImage("file" , '../../images/shope/' , 200 , 600);
		$img_image = $images["image"];
		$img_thumbnail = $images["thumbnail"];
    
	}
	else
	{
		$img_image = "";
		$img_thumbnail = "";
	}

	$sho_id= $_POST["sho_id"];
    $sho_name = $_POST["sho_name"];
    $sho_address = $_POST["sho_address"];
    $sho_email = $_POST["sho_email"]== null ?"لايوجد بريد الكتروني" : $_POST["sho_email"] ;
	
    $sho_not = $_POST["sho_not"];
    $typ_id = $_POST["typ_id"]==null ?"لايوجد": $typ_id = $_POST["typ_id"];
    $cit_id = $_POST["cit_id"]==null ?"لايوجد": $cit_id = $_POST["cit_id"];
    $str_id = $_POST["str_id"]==null ?"لايوجد": $str_id = $_POST["str_id"];
    $sho_mobile = $_POST["sho_mobile"];
    $sho_phone = $_POST["sho_phone"]== null ?"لايوجد هاتف ارضي" : $_POST["sho_phone"] ;

    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($sho_name)));
    array_push($updateArray, htmlspecialchars(strip_tags($sho_address)));
    array_push($updateArray, htmlspecialchars(strip_tags($sho_email)));

    array_push($updateArray, htmlspecialchars(strip_tags($sho_not)));
    array_push($updateArray, htmlspecialchars(strip_tags($typ_id)));
	
    array_push($updateArray, htmlspecialchars(strip_tags($cit_id)));
    array_push($updateArray, htmlspecialchars(strip_tags($str_id)));
    array_push($updateArray, htmlspecialchars(strip_tags($sho_mobile)));
    array_push($updateArray, htmlspecialchars(strip_tags($sho_phone)));

	
	  
	if($img_image != "")
	{
		array_push($updateArray, htmlspecialchars(strip_tags($img_image)));
		array_push($updateArray, htmlspecialchars(strip_tags($img_thumbnail)));
	}
    array_push($updateArray, htmlspecialchars(strip_tags($sho_id)));

	if($img_image != "")
	{
		$sql = "update shope set sho_name=?,sho_address=?,sho_email=?,sho_not=?,typ_id=?,cit_id=?,str_id=?,sho_mobile=?,sho_phone=?,sho_image = ? , sho_thumbnail = ? 
	     where sho_id=?";
	}
	else
	{
		$sql = "update shope set sho_name=?,sho_address=?,sho_email=?,sho_not=?,typ_id=?,cit_id=?,str_id=?,sho_mobile=?,sho_phone=?
		where sho_id=?";
	}
    $result = dbExec($sql, $updateArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
