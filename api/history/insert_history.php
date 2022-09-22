<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";

if (
    isset($_POST["id_use"])
   // &&isset($_POST["his_type"])
    
  
  
) {
	
   // $id_use = $_POST["id_use"];
   $his_type = $_POST["his_type"];
   
   $his_note = $_POST["his_note"];
   $id_use = $_POST["id_use"];

   
	
	

  //array_push($insertArray, htmlspecialchars(strip_tags($his_regdate)));

    $insertArray = array();
    array_push($insertArray, htmlspecialchars(strip_tags($his_type)));
    array_push($insertArray, htmlspecialchars(strip_tags($his_note)));
    array_push($insertArray, htmlspecialchars(strip_tags($id_use)));
	
	 

    $sql = "insert into history 
          (his_type , his_note , id_use , his_regdate)values(?  , ?  , ? , now() )";
    $result = dbExec($sql, $insertArray);


    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
