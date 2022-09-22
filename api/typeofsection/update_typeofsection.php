<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["sec_id"])
    && is_numeric($_POST["sec_id"])
    && isset($_POST["sec_name"])
   
    
    && is_auth()
) {
		if (!empty($_FILES["file"]['name']) )
	{
		$images = uploadImage("file" , '../../images/typeofsection/' , 200 , 600);
		$img_image = $images["image"];
		$img_thumbnail = $images["thumbnail"];
    
	}
	else
	{
		$img_image = "";
		$img_thumbnail = "";
	}

	
    $sec_name = $_POST["sec_name"];
    
   
    $sec_id = $_POST["sec_id"];

    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($sec_name)));
    
	if($img_image != "")
	{
		array_push($updateArray, htmlspecialchars(strip_tags($img_image)));
		array_push($updateArray, htmlspecialchars(strip_tags($img_thumbnail)));
	}
    array_push($updateArray, htmlspecialchars(strip_tags($sec_id)));

	if($img_image != "")
	{
		$sql = "update typeofsection 
		set sec_name=?,
		sec_image = ? , sec_thumbnail = ? , 
		sec_regdate=now()
		where sec_id=?";
	}
	else
	{
		$sql = "update typeofsection 
		set sec_name=?,
		
		sec_regdate=now()
		where sec_id=?";
	}
    $result = dbExec($sql, $updateArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
