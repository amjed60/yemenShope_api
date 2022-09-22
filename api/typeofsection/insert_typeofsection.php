<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (
    isset($_POST["sec_name"])
    && isset($_POST["typ_id"])
  
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
    $typ_id = $_POST["typ_id"];
	
	


    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($sec_name)));
    array_push($insertArray, htmlspecialchars(strip_tags($typ_id)));
	
	  array_push($insertArray, htmlspecialchars(strip_tags($img_image)));
    array_push($insertArray, htmlspecialchars(strip_tags($img_thumbnail)));


    $sql = "insert into typeofsection
        (sec_name , typ_id ,sec_image , sec_thumbnail, sec_regdate )
            values(? , ? , ?, ?, now())";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
