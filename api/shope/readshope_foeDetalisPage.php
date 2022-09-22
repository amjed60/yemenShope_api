<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";
if (
    isset($_GET["sho_id"])
    && is_numeric($_GET["sho_id"])
    && is_auth()
) {
    $sho_id = htmlspecialchars(strip_tags($_GET["sho_id"]));
 


    $selectArray = array();
    array_push($selectArray, $sho_id);

    /*
         $sql="select s1.sho_name,s1.sho_address,s1.sho_mobile,s1.sho_image,s1.isactive,
         t2.sec_name,t2.sec_id,
         p3.ty_pacName ,p3.ty_pacPrice,p3.ty_pacNumberProduct
         from shope as s1
         LEFT JOIN typeofsection as t2
         ON s1.typ_id=t2.typ_id
         LEFT JOIN Type_Package as p3
         ON s1.ty_pacID=p3.ty_pacID
         where s1.sho_id=?  "; */
     
     $sql="select
     
     s1.*,
         c.cit_name,
         st.str_name,
         m.mal_name,m.mal_image,
          su.su_whats,su.su_link,su.su_face,su.su_twa,su.su_telg,su.su_web,su.su_inst,su.su_github,su.su_phon,
          su.su_email,su.su_phone2,
         p3.ty_pacName ,p3.ty_pacPrice,p3.ty_pacNumberProduct
         from shope as s1
         LEFT JOIN Type_Package as p3
         ON s1.ty_pacID=p3.ty_pacID
         LEFT JOIN city as c
         ON s1.cit_id=c.cit_id
         LEFT JOIN street as st
         ON s1.str_id=st.str_id
         LEFT JOIN mall as m
         ON s1.mal_id=m.mal_id and s1.ismall !=0
        LEFT JOIN socialURL as su
         ON s1.sho_id=su.sho_id
         where s1.sho_id=?  "; 
    
    //$sql = "select * from shope where sho_id = ?";
    $result = dbExec($sql, $selectArray);
    $arrJson = array();
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $arrJson[] = $row;
        }
    }
    $resJson = array("result" => "success", "code" => "200", "message" => $arrJson);
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
