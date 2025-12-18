<?php
function connecte()
{
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $db = "courses";
    $conn = new mysqli($serverName, $userName, $password, $db);
    return $conn;
}
function 

?>