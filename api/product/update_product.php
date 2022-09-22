<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["pro_id"])
   // && is_numeric($_POST["pro_id"])
   // && isset($_POST["pro_name"])
   // && isset($_POST["pro_name_en"])
   // && isset($_POST["pro_price"])
//	&& isset($_POST["pro_info"])
	//		 && isset($_POST["pro_info_en"])
	//		 && isset($_POST["pro_barcode"])
    
    && is_auth()
) {
		if (!empty($_FILES["file"]['name']) )
	{
		$images = uploadImage("file" , '../../images/product/' , 200 , 600);
		$img_image = $images["image"];
		$img_thumbnail = $images["thumbnail"];
    
	}
	else
	{
		$img_image = "";
		$img_thumbnail = "";
	}

	
	$pro_name = $_POST["pro_name"]== null ? "لايوجد اسم" : $_POST["pro_name"]  ;
    $pro_name_en = $_POST["pro_name_en"]== null ? "لايوجد اسم en " : $_POST["pro_name_en"]  ;
	$pro_offer = $_POST["pro_offer"] == null ? "0" : $_POST["pro_offer"]  ;
	$pro_new_price = $_POST["pro_new_price"]== null ? "0" : $_POST["pro_new_price"]  ;
    $pro_info = $_POST["pro_info"]== null ?"لايوجد معلومات" : $_POST["pro_info"] ;
	$pro_barcode=$_POST["pro_barcode"]== null ?"لايوجد باركود" : $_POST["pro_barcode"] ;
	
	$pro_state = $_POST["pro_state"]== null ?"لايوجد حالة" : $_POST["pro_state"] ;
	$pro_old_price = $_POST["pro_old_price"]== null ?"0" : $_POST["pro_old_price"] ;
    $pro_not = $_POST["pro_not"]== null ?"لايوجد ملاحضات" : $_POST["pro_not"] ;
    $pro_color = $_POST["pro_color"] == null ? "لايوجد لون" : $_POST["pro_color"]  ;
    $pro_size = $_POST["pro_size"]== null ?"لايوجد مقاس " : $_POST["pro_size"] ;
	$cit_id = $_POST["cit_id"]== null ? "0" : $_POST["cit_id"]  ;
	$str_id = $_POST["str_id"] == null ? "0" : $_POST["str_id"]  ;
	$sho_id=$_POST["sho_id"]== null ? "0" : $_POST["sho_id"]  ;
	$sec_id = $_POST["sec_id"]== null ? "0" : $_POST["sec_id"]  ;
	
    
   
    $pro_id = $_POST["pro_id"];

    $updateArray = array();
	array_push($updateArray, htmlspecialchars(strip_tags($pro_name)));
	array_push($updateArray, htmlspecialchars(strip_tags($pro_name_en)));
    array_push($updateArray, htmlspecialchars(strip_tags($pro_offer)));
	array_push($updateArray, htmlspecialchars(strip_tags($pro_new_price)));
	array_push($updateArray, htmlspecialchars(strip_tags($pro_info)));
	array_push($updateArray, htmlspecialchars(strip_tags($pro_barcode)));
	array_push($updateArray, htmlspecialchars(strip_tags($pro_state)));
	array_push($updateArray, htmlspecialchars(strip_tags($pro_old_price)));
	array_push($updateArray, htmlspecialchars(strip_tags($pro_not)));
	array_push($updateArray, htmlspecialchars(strip_tags($pro_color)));
	array_push($updateArray, htmlspecialchars(strip_tags($pro_size)));
	array_push($updateArray, htmlspecialchars(strip_tags($cit_id)));
    array_push($updateArray, htmlspecialchars(strip_tags($str_id)));
    array_push($updateArray, htmlspecialchars(strip_tags($sho_id)));
	array_push($updateArray, htmlspecialchars(strip_tags($sec_id)));
	if($img_image != "")
	{
		array_push($updateArray, htmlspecialchars(strip_tags($img_image)));
		array_push($updateArray, htmlspecialchars(strip_tags($img_thumbnail)));
	}
    array_push($updateArray, htmlspecialchars(strip_tags($pro_id)));


	if($img_image != "")
	{
		$sql = "update product set pro_name=?,pro_name_en=?, pro_offer=?,pro_new_price=?, pro_info=?,pro_barcode=?, pro_state=?,pro_old_price=?, pro_not=?,pro_color=?, pro_size=?,cit_id=?, str_id=?,sho_id=?, sec_id=?,pro_image = ? , pro_thumbnail = ? 
		         where pro_id=?";
	}
	else
	{
			$sql = "update product set pro_name=?,pro_name_en=?, pro_offer=?,pro_new_price=?, pro_info=?,pro_barcode=?, pro_state=?,pro_old_price=?, pro_not=?,pro_color=?, pro_size=?,cit_id=?, str_id=?,sho_id=?, sec_id=?where pro_id=?";
	}
    $result = dbExec($sql, $updateArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
