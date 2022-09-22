<?php

//require 'api/config/config.php';
include_once "../../api/config/config.php";

$cus_id=$_POST['cus_id'];
$sho_id=$_POST['sho_id'];
$select=$conn->query("SELECT * FROM rateingshope WHERE sho_id= '".$sho_id."' AND cus_id= '".$cus_id."'");
$count=mysqli_num_rows($select);
$data=mysqli_fetch_assoc($select);

$sho_id=$data['sho_id'];
$userData=$data['cus_id'];
//https://madinahic.000webhostapp.com
if($count == 1){
    echo json_encode("200");
}else{
    echo json_encode("400");

}

?>