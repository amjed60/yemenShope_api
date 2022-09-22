<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
include_once "../../library/create_image.php";
if (
    isset($_POST["sho_id"])
    && isset($_POST["num"])
 
    
    && is_auth()
) {
		
	if($_POST["num"]=="1")
    {
    $su_whats = $_POST["su_whats"];
   
   
    $sho_id = $_POST["sho_id"];

    $updateArray = array();
    array_push($updateArray, htmlspecialchars(strip_tags($su_whats)));
	
    array_push($updateArray, htmlspecialchars(strip_tags($sho_id)));

		$sql = "update socialURL 
		set su_whats=?
		where sho_id=?";
    $result = dbExec($sql, $updateArray);
    }
    if($_POST["num"]=="2"){
        $su_twa = $_POST["su_twa"];
       
       
        $sho_id = $_POST["sho_id"];
    
        $updateArray = array();
        array_push($updateArray, htmlspecialchars(strip_tags($su_twa)));
        
        array_push($updateArray, htmlspecialchars(strip_tags($sho_id)));
    
            $sql = "update socialURL 
            set su_twa=?
            where sho_id=?";
        $result = dbExec($sql, $updateArray);
        }
        if($_POST["num"]=="3"){
            $su_face = $_POST["su_face"];
           
           
            $sho_id = $_POST["sho_id"];
        
            $updateArray = array();
            array_push($updateArray, htmlspecialchars(strip_tags($su_face)));
            
            array_push($updateArray, htmlspecialchars(strip_tags($sho_id)));
        
                $sql = "update socialURL 
                set su_face=?
                where sho_id=?";
            $result = dbExec($sql, $updateArray);
            }
            if($_POST["num"]=="4"){
                $su_link = $_POST["su_link"];
               
               
                $sho_id = $_POST["sho_id"];
            
                $updateArray = array();
                array_push($updateArray, htmlspecialchars(strip_tags($su_link)));
                
                array_push($updateArray, htmlspecialchars(strip_tags($sho_id)));
            
                    $sql = "update socialURL 
                    set su_link=?
                    where sho_id=?";
                $result = dbExec($sql, $updateArray);
                }
                if($_POST["num"]=="5"){
                    $su_telg = $_POST["su_telg"];
                   
                   
                    $sho_id = $_POST["sho_id"];
                
                    $updateArray = array();
                    array_push($updateArray, htmlspecialchars(strip_tags($su_telg)));
                    
                    array_push($updateArray, htmlspecialchars(strip_tags($sho_id)));
                
                        $sql = "update socialURL 
                        set su_telg=?
                        where sho_id=?";
                    $result = dbExec($sql, $updateArray);
                    }
                    if($_POST["num"]=="6"){
                        $su_web = $_POST["su_web"];
                         $sho_id = $_POST["sho_id"];
                        $updateArray = array();
                        array_push($updateArray, htmlspecialchars(strip_tags($su_web)));
                        array_push($updateArray, htmlspecialchars(strip_tags($sho_id)));
                    $sql = "update socialURL 
                            set su_web=?
                            where sho_id=?";
                        $result = dbExec($sql, $updateArray);
                        }
                        if($_POST["num"]=="7"){
                            $su_inst = $_POST["su_inst"];
                             $sho_id = $_POST["sho_id"];
                            $updateArray = array();
                            array_push($updateArray, htmlspecialchars(strip_tags($su_inst)));
                            array_push($updateArray, htmlspecialchars(strip_tags($sho_id)));
                        $sql = "update socialURL 
                                set su_inst=?
                                where sho_id=?";
                            $result = dbExec($sql, $updateArray);
                            }
                            if($_POST["num"]=="8"){
                                $su_github = $_POST["su_github"];
                                 $sho_id = $_POST["sho_id"];
                                $updateArray = array();
                                array_push($updateArray, htmlspecialchars(strip_tags($su_github)));
                                array_push($updateArray, htmlspecialchars(strip_tags($sho_id)));
                            $sql = "update socialURL 
                                    set su_github=?
                                    where sho_id=?";
                                $result = dbExec($sql, $updateArray);
                                }
                                if($_POST["num"]=="9"){
                                    $su_phon = $_POST["su_phon"];
                                     $sho_id = $_POST["sho_id"];
                                    $updateArray = array();
                                    array_push($updateArray, htmlspecialchars(strip_tags($su_phon)));
                                    array_push($updateArray, htmlspecialchars(strip_tags($sho_id)));
                                $sql = "update socialURL 
                                        set su_phon=?
                                        where sho_id=?";
                                    $result = dbExec($sql, $updateArray);
                                    }
                                    if($_POST["num"]=="10"){
                                        $su_phone2 = $_POST["su_phone2"];
                                         $sho_id = $_POST["sho_id"];
                                        $updateArray = array();
                                        array_push($updateArray, htmlspecialchars(strip_tags($su_phone2)));
                                        array_push($updateArray, htmlspecialchars(strip_tags($sho_id)));
                                    $sql = "update socialURL 
                                            set su_phone2=?
                                            where sho_id=?";
                                        $result = dbExec($sql, $updateArray);
                                        }
                                       
    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
