<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";

if (
    isset($_POST["token_1"])
    && isset($_POST["title"])
    && isset($_POST["body"])
 //&& isset($_POST["image"])
    && is_auth()
) {
    $token_1 = $_POST["token_1"];
    $title = $_POST["title"];
    $body = $_POST["body"];
    $image = $_POST["image"];

$SERVER_API_KEY="AAAA66KrSqA:APA91bF0PbRVVRNXZ4dgd77vqn3gAW2RPd9qF5njj1qciK34pUdDSA5qr3wssp3kVwwm7rVwoSYR9AL6byp1NkAj7dgFH5LgkXlexNwVG_7kUaF4RYIe7cbgOIcdItWJD9nW19x9Hi9Q";
//$token_1="esJBtibES6K_BZKE3ArWtj:APA91bF4ufpqdzySK1w5zPPB6yKKlcIiHQ9hO-jmNrPdMSkeK3HACOSOQFSRNkaGqjG-87alGtdK9-DguyWFcoaCC82onKVb72Z9qoa7d_KxMpnUs0lqql63HfrudINU0DBPD_n28zim";

$data=[
    "registration_ids"=>[$token_1],
    "notification"=>[
        "title"=>$title,
        "body"=>$body,
        "sound"=>"default",
       "priority"=> 'high',
       "image"=> $image
    ],
     
];

$dataString=json_encode($data);

$headers=[
'Authorization: key=' . $SERVER_API_KEY,
'Content-Type: application/json',
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

$response = curl_exec($ch);

echo json_encode($response, JSON_UNESCAPED_UNICODE);
#dd($response);

}else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
