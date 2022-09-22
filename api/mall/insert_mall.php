<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (
    isset($_POST["mal_name"])
   // && isset($_POST["mal_not"])
  
) {
	if (!empty($_FILES["file"]['name']) )
	{
		$images = uploadImage("file" , '../../images/mall/' , 200 , 600);
		$img_image = $images["image"];
		$img_thumbnail = $images["thumbnail"];
    
    
	}
	else
	{
		$img_image = "";
		$img_thumbnail = "";
	}
    $mal_name = $_POST["mal_name"];
    $mal_not = $_POST["mal_not"];
	$cit_id = $_POST["cit_id"];
    $str_id = $_POST["str_id"];
	
	


    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($mal_name)));
    array_push($insertArray, htmlspecialchars(strip_tags($mal_not)));
    array_push($insertArray, htmlspecialchars(strip_tags($cit_id)));
    array_push($insertArray, htmlspecialchars(strip_tags($str_id)));
	
	  array_push($insertArray, htmlspecialchars(strip_tags($img_image)));
    array_push($insertArray, htmlspecialchars(strip_tags($img_thumbnail)));


    $sql = "insert into mall(mal_name , mal_not,cit_id,str_id ,mal_image , mal_thumbnail )
            values(? , ? , ?, ?,?,? )";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
