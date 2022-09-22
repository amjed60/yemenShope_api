<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (
    isset($_POST["sho_name"])
    && isset($_POST["sho_address"])
  
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
    $sho_name = $_POST["sho_name"];
     $cus_id = $_POST["cus_id"];
    $sho_address = $_POST["sho_address"];
    $sho_email = $_POST["sho_email"]== null ?"لايوجد بريد الكتروني" : $_POST["sho_email"] ;
	
    $sho_not = $_POST["sho_not"];
    $typ_id = $_POST["typ_id"]==null ?"لايوجد": $typ_id = $_POST["typ_id"];
    $cit_id = $_POST["cit_id"]==null ?"لايوجد": $cit_id = $_POST["cit_id"];
    $str_id = $_POST["str_id"]==null ?"لايوجد": $str_id = $_POST["str_id"];
    $sho_mobile = $_POST["sho_mobile"];
    $sho_phone = $_POST["sho_phone"]== null ?"لايوجد هاتف ارضي" : $_POST["sho_phone"] ;
    $ismall = $_POST["ismall"];
    $mal_id = $_POST["mal_id"];
     $ty_pacID = $_POST["ty_pacID"];
     $isactive = $_POST["isactive"];

    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($sho_name)));
    array_push($insertArray, htmlspecialchars(strip_tags($isactive)));
    array_push($insertArray, htmlspecialchars(strip_tags($ty_pacID)));
     array_push($insertArray, htmlspecialchars(strip_tags($cus_id)));
    array_push($insertArray, htmlspecialchars(strip_tags($sho_address)));
    array_push($insertArray, htmlspecialchars(strip_tags($sho_email)));

    array_push($insertArray, htmlspecialchars(strip_tags($sho_not)));
    array_push($insertArray, htmlspecialchars(strip_tags($typ_id)));
	
    array_push($insertArray, htmlspecialchars(strip_tags($cit_id)));
    array_push($insertArray, htmlspecialchars(strip_tags($str_id)));
    array_push($insertArray, htmlspecialchars(strip_tags($sho_mobile)));
    array_push($insertArray, htmlspecialchars(strip_tags($sho_phone)));

    array_push($insertArray, htmlspecialchars(strip_tags($ismall)));
    array_push($insertArray, htmlspecialchars(strip_tags($mal_id)));
	
	  array_push($insertArray, htmlspecialchars(strip_tags($img_image)));
    array_push($insertArray, htmlspecialchars(strip_tags($img_thumbnail)));
//	sho_regdate=now()

    $sql = "insert into shope
        (sho_name ,isactive,ty_pacID,cus_id, sho_address,sho_email,sho_not, typ_id,cit_id,str_id,sho_mobile,sho_phone,ismall,mal_id,sho_image , sho_thumbnail )
            values(?,?,? ,?, ? , ?,?, ?,?,?,?,?,?,?,?,?)";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}


/*
if (
    isset($_POST["sho_name"])
    && isset($_POST["sho_address"])
    //&& isset($_POST["sho_email"])
    //&& isset($_POST["sho_not"])
    //&& isset($_POST["typ_id"])
    //&& isset($_POST["cit_id"])
    //&& isset($_POST["str_id"])
    //&& isset($_POST["sho_mobile"])
   // && isset($_POST["sho_phone"])
  
) {
  //  
  $sho_name = $_POST["sho_name"];
  $sho_address = $_POST["sho_address"];
  /*
  $sho_email = $_POST["sho_email"];
  $sho_not = $_POST["sho_not"];
  $typ_id = $_POST["typ_id"];
  $cit_id = $_POST["cit_id"];
  $str_id = $_POST["str_id"];
  $sho_mobile = $_POST["sho_mobile"];
  $sho_phone = $_POST["sho_phone"]== null ?"لايوجد هاتف ارضي" : $_POST["sho_phone"] ;
//  $sho_name = $_POST["sho_phone"];
  
  

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
   

    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($sho_name)));
    array_push($insertArray, htmlspecialchars(strip_tags($sho_address)));
    /*
    array_push($insertArray, htmlspecialchars(strip_tags($sho_email)));
    array_push($insertArray, htmlspecialchars(strip_tags($sho_not)));
    array_push($insertArray, htmlspecialchars(strip_tags($typ_id)));
    array_push($insertArray, htmlspecialchars(strip_tags($cit_id)));
    array_push($insertArray, htmlspecialchars(strip_tags($str_id)));
    array_push($insertArray, htmlspecialchars(strip_tags($sho_mobile)));
   // array_push($insertArray, htmlspecialchars(strip_tags($sho_active)));
    array_push($insertArray, htmlspecialchars(strip_tags($sho_phone)));

	  array_push($insertArray, htmlspecialchars(strip_tags($img_image)));
    array_push($insertArray, htmlspecialchars(strip_tags($img_thumbnail)));
    $sql = "insert into shope(sho_name,sho_address)values(?,?,?,?)";
/*
    $sql = "insert into shope
        (sho_name , sho_address ,sho_email,sho_not,typ_id,cit_id,str_id
        ,sho_mobile,sho_active,sho_phone,img_image , img_thumbnail )
        values(? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? )";
        
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
*/