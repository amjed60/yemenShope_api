<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (
    isset($_POST["sli_name"])&&
    isset($_POST["sho_id"])&&
    isset($_POST["sli_des"])&&
    isset($_POST["sli_mess"])
   
  
) {
	if (!empty($_FILES["file"]['name']) )
	{
		$images = uploadImage("file" , '../../images/slider/' , 200 , 600);
		$img_image = $images["image"];
		$img_thumbnail = $images["thumbnail"];
    
    
	}
	else
	{
		$img_image = "";
		$img_thumbnail = "";
	}
    $sli_name = $_POST["sli_name"];
    $sho_id = $_POST["sho_id"];
    $sli_des = $_POST["sli_des"];
    $sli_mess = $_POST["sli_mess"];
	
	


    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($sli_name)));
    array_push($insertArray, htmlspecialchars(strip_tags($sho_id)));
    array_push($insertArray, htmlspecialchars(strip_tags($sli_des)));
    array_push($insertArray, htmlspecialchars(strip_tags($sli_mess)));
	array_push($insertArray, htmlspecialchars(strip_tags($img_image)));
    array_push($insertArray, htmlspecialchars(strip_tags($img_thumbnail)));


    $sql = "insert into slider
            (sli_name , sho_id , sli_des , sli_mess , sli_image , sli_thumbnail , sli_regdate )
                values(? , ? , ? , ? , ? , ? , now())";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
