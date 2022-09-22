<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (
    isset($_POST["typ_name"])
    && isset($_POST["typ_city"])
  
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
	
	


    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($typ_name)));
    array_push($insertArray, htmlspecialchars(strip_tags($typ_city)));
	
    array_push($insertArray, htmlspecialchars(strip_tags($img_image)));
    array_push($insertArray, htmlspecialchars(strip_tags($img_thumbnail)));

    $sql = "insert into typeofshope
        (typ_name , typ_city ,typ_image , typ_thumbnail )
            values(? , ? ,?,?)";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
