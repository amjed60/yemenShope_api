<?php

//require 'api/config/config.php';
include_once "../../api/config/config.php";

$sho_email=$_POST['sho_email'];
$select=$conn->query("SELECT * FROM shope WHERE sho_email='".$sho_email."'");
$count=mysqli_num_rows($select);
$data=mysqli_fetch_assoc($select);

$idData=$data['sho_id'];
$userData=$data['sho_email'];
//https://madinahic.000webhostapp.com
if($count == 1){
    echo json_encode("200");
}else{
    echo json_encode("400");

}

?>