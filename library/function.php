<?php
include_once "database.php";

const token = "wjeiwenwdyejwkejgcdnbnmli0o878jhjnwke98w9e8wewnew8wehwenj232jh3kh2j3h2j3h2j";
function dbExec($sql, $param_array)
{
    $database = new Database();
    $database->getConnection();
    $myCon = $database->conn;
    $stmt = $myCon->prepare($sql);
    $stmt->execute($param_array);
    return $stmt;
}
function is_auth()
{
    if (isset($_GET["token"]) && $_GET["token"] == token) {
        return true;
    } else {
        return false;
    }
}
