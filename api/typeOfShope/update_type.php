<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["typ_id"])
   // && is_numeric($_POST["typ_id"])
    && isset($_POST["typ_name"])
    && isset($_POST["typ_city"])
    
    && is_auth()
) {
    if (!empty($_FILES["file"]['name']) )
	{
		$images = uploadImage("file" , '../../images/type/' , 200 , 600);
		$img_image = $images["image"];
		$img_thumbnail = $images["thumbnail"];
    
	}
	else
	{
		$img_image = "";
		$img_thumbnail = "";
	}

	
    $typ_name = $_POST["typ_name"];
    $typ_city = $_POST["typ_city"];
   
    $typ_id = $_POST["typ_id"];

    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($typ_name)));
    array_push($updateArray, htmlspecialchars(strip_tags($typ_city)));
	if($img_image != "")
	{
		array_push($updateArray, htmlspecialchars(strip_tags($img_image)));
		array_push($updateArray, htmlspecialchars(strip_tags($img_thumbnail)));
	}
    array_push($updateArray, htmlspecialchars(strip_tags($typ_id)));

	if($img_image != "" && $img_image!=null)
	{
	
		$sql = "update typeofshope 
		set typ_name=?,typ_city=?,
        typ_image = ? , typ_thumbnail = ? 
		where typ_id=?";
    }
    else
	{
        $sql = "update typeofshope 
		set typ_name=?,typ_city=?
        
		where typ_id=?";
	}
    $result = dbExec($sql, $updateArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
